<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require '../src/vendor/autoload.php';
$app = new \Slim\App;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Function to generate a new access token
function generateAccessToken() {
    $secretKey = 'server_hack';
    $issuedAt = time();
    $expirationTime = $issuedAt + 3600; // Token valid for 1 hour
    $tokenPayload = [
        'iss' => 'http://library.org',
        'aud' => 'http://library.com',
        'iat' => $issuedAt,
        'exp' => $expirationTime,
    ];
    return JWT::encode($tokenPayload, $secretKey, 'HS256');
}

// Register a new user (original code kept)
$app->post('/user/register', function (Request $request, Response $response) use ($servername, $username, $password, $dbname) {
    $data = json_decode($request->getBody());
    $uname = $data->username;
    $pass = $data->password;
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password) VALUES (:uname, :pass)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':uname' => $uname, ':pass' => $hashedPassword]);
        $response->getBody()->write(json_encode(["status" => "success", "message" => "User registered successfully"]));

    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => "Registration failed: " . $e->getMessage()]));
    }

    $conn = null;
    return $response;
});

// Authenticate a user and generate access token (original code kept)
$app->post('/user/auth', function (Request $request, Response $response, array $args) use ($servername, $username, $password, $dbname) {
    error_reporting(E_ALL);
    $data = json_decode($request->getBody());
    $uname = $data->username;
    $pass = $data->password;

    try {    
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users WHERE username = :uname";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':uname' => $uname]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $userData = $stmt->fetch();

        if ($userData && password_verify($pass, $userData['password'])) {
            // Generate Access Token
            $accessToken = generateAccessToken();
            // Store the token in the database without user reference
            storeToken($accessToken);

            // Return the new access token
            $response->getBody()->write(json_encode([
                "status" => "success",
                "access_token" => $accessToken
            ]));
        } else {
            $response->getBody()->write(json_encode(["status" => "fail", "message" => "Invalid username or password"]));
        }

    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }

    $conn = null;
    return $response;
});

// Function to store tokens in the database
function storeToken($token) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "INSERT INTO jwt_tokens (token, used, created_at) VALUES (:token, 0, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':token' => $token]);
    } catch (PDOException $e) {
        error_log($e->getMessage()); // Log any errors for debugging
    }
}

// Function to delete expired tokens
function deleteExpiredTokens() {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "DELETE FROM jwt_tokens WHERE created_at < NOW() - INTERVAL 1 DAY";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        error_log($e->getMessage()); // Log any errors for debugging
    }
}

// Token validation middleware
function validateToken(Request $request, Response $response, $next) {
    deleteExpiredTokens();
    $data = json_decode($request->getBody(), true);

    if (!isset($data['token'])) {
        return $response->withStatus(401)->write(json_encode(["status" => "fail", "message" => "Token missing"]));
    }

    $token = $data['token'];
    $key = 'server_hack';

    try {
        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        if ($decoded->exp < time()) {
            return $response->withStatus(401)->write(json_encode(["status" => "fail", "message" => "Token has expired"]));
        }

        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "SELECT used FROM jwt_tokens WHERE token = :token";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':token' => $token]);
        $tokenData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$tokenData || $tokenData['used'] == 1) {
            return $response->withStatus(401)->write(json_encode(["status" => "fail", "message" => "Token has already been used or is invalid"]));
        }
    } catch (Exception $e) {
        return $response->withStatus(401)->write(json_encode(["status" => "fail", "message" => "Unauthorized"]));
    }

    return $next($request, $response);
}

// Mark token as used after successful request
function markTokenAsUsed($token) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "UPDATE jwt_tokens SET used = 1 WHERE token = :token";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':token' => $token]);
    } catch (PDOException $e) {
        error_log($e->getMessage()); // Log any errors for debugging
    }
}

// Generate a new access token and return it
function respondWithNewAccessToken(Response $response) {
    $newAccessToken = generateAccessToken();
    storeToken($newAccessToken);
    return $response->withHeader('New-Access-Token', $newAccessToken);
}

// Create a new author
$app->post('/authors', function (Request $request, Response $response) {
    $data = json_decode($request->getBody(), true);
    $name = $data['name'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "INSERT INTO authors (name) VALUES (:name)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':name' => $name]);

        markTokenAsUsed($data['token']);

        $response = respondWithNewAccessToken($response);
        $response->getBody()->write(json_encode(["status" => "success", "access_token" => $response->getHeader('New-Access-Token')[0], "message" => "Author added successfully"]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }

    return $response;
})->add('validateToken');

// Get all authors
$app->get('/authors/get', function (Request $request, Response $response) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $stmt = $conn->query("SELECT * FROM authors");
        $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        markTokenAsUsed($request->getParsedBody()['token']);
        $response = respondWithNewAccessToken($response);
        $response->getBody()->write(json_encode(["status" => "success", "access_token" => $response->getHeader('New-Access-Token')[0], "data" => $authors]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }

    return $response;
})->add('validateToken');

// Update an author
$app->put('/authors/update/{id}', function (Request $request, Response $response, array $args) {
    $data = json_decode($request->getBody(), true);
    $id = $args['id'];
    $name = $data['name'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "UPDATE authors SET name = :name WHERE authorid = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':name' => $name, ':id' => $id]);

        markTokenAsUsed($data['token']);
        $response = respondWithNewAccessToken($response);
        $response->getBody()->write(json_encode(["status" => "success", "access_token" => $response->getHeader('New-Access-Token')[0], "message" => "Author updated successfully"]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }

    return $response;
})->add('validateToken');

// Delete an author
$app->delete('/authors/delete/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "DELETE FROM authors WHERE authorid = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);

        markTokenAsUsed($request->getParsedBody()['token']);
        $response = respondWithNewAccessToken($response);
        $response->getBody()->write(json_encode(["status" => "success", "access_token" => $response->getHeader('New-Access-Token')[0], "message" => "Author deleted successfully"]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }

    return $response;
})->add('validateToken');

// Get all books
$app->get('/books/get', function (Request $request, Response $response) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $stmt = $conn->query("SELECT * FROM books");
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        markTokenAsUsed($request->getParsedBody()['token']);
        $response = respondWithNewAccessToken($response);
        $response->getBody()->write(json_encode(["status" => "success", "access_token" => $response->getHeader('New-Access-Token')[0], "data" => $books]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }

    return $response;
})->add('validateToken');

// Add a new book
$app->post('/books', function (Request $request, Response $response) {
    $data = json_decode($request->getBody(), true);
    $title = $data['title'];
    $author_id = $data['author_id'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "INSERT INTO books (title, authorid) VALUES (:title, :authorid)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':title' => $title, ':authorid' => $author_id]);

        markTokenAsUsed($data['token']);
        $response = respondWithNewAccessToken($response);
        $response->getBody()->write(json_encode(["status" => "success", "access_token" => $response->getHeader('New-Access-Token')[0], "message" => "Book added successfully"]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }

    return $response;
})->add('validateToken');

// Update a book
$app->put('/books/update/{id}', function (Request $request, Response $response, array $args) {
    $data = json_decode($request->getBody(), true);
    $id = $args['id'];
    $title = $data['title'];
    $author_id = $data['author_id'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "UPDATE books SET title = :title, authorid = :authorid WHERE bookid = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':title' => $title, ':authorid' => $author_id, ':id' => $id]);

        markTokenAsUsed($data['token']);
        $response = respondWithNewAccessToken($response);
        $response->getBody()->write(json_encode(["status" => "success", "access_token" => $response->getHeader('New-Access-Token')[0], "message" => "Book updated successfully"]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }

    return $response;
})->add('validateToken');

// Delete a book
$app->delete('/books/delete/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=library", "root", "");
        $sql = "DELETE FROM books WHERE bookid = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);

        markTokenAsUsed($request->getParsedBody()['token']);
        $response = respondWithNewAccessToken($response);
        $response->getBody()->write(json_encode(["status" => "success", "access_token" => $response->getHeader('New-Access-Token')[0], "message" => "Book deleted successfully"]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }

    return $response;
})->add('validateToken');

$app->run();
