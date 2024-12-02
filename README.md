# Library API

## A fully functional library system API, this repository enables interaction with resources including users, authors, and books. Built with PHP and the Slim framework, the API integrates secure user authentication via JSON Web Tokens (JWT).

This repository hosts a comprehensive API designed to support a library management system, enabling efficient interactions with various library resources such as users, authors, and books. The API is developed using PHP, in combination with the Slim framework, which provides a lightweight and streamlined structure ideal for building robust web services. Additionally, it incorporates secure user authentication through JSON Web Tokens (JWT), ensuring that only authorized users can access protected endpoints and perform actions. This security feature is essential for safeguarding user data and library resources. The API offers a range of endpoints to manage core library functions, making it suitable for integration into diverse library management applications or systems.

## Table of Contents
- [Overview](#overview)
- [Getting Started](#getting-started)
- [Endpoints](#endpoints)
  - [User Endpoints](#user-endpoints)
  - [Author Endpoints](#author-endpoints)
  - [Book Endpoints](#book-endpoints)
- [Token Management](#token-management)
- [Database Structure](#database-structure)
- [Contributing](#contributing)

---

## Overview
The **Library API** is a RESTful service built with PHP and the Slim framework. It supports basic CRUD operations for authors and books, along with user registration and authentication. JWTs are used to manage user sessions and ensure secure data transactions.

### Key Features
- **User Authentication** with JWT tokens.
- **CRUD operations** for authors and books.
- **Token validation and expiration management** for security.
- **Structured error handling** and descriptive response messages.

## Getting Started

### Prerequisites
- PHP >= 7.4
- MySQL
- Composer for dependency management

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/library-api.git

## Endpoints

### User Endpoints
**1. Register a New User**
- URL: /user/register
- Method: POST
- Description: Registers a new user with username and password
- Request Body:
   ```bash
   {
  "username": "rob",
  "password": "password123"
   }
- Response:
   ```bash
   {
  "status": "success",
  "message": "User registered successfully"
   }

**2. Authenticate a User**
- URL: /user/auth
- Method: POST
- Description: Authenticates a user and provides an access token.
- Request Body:
   ```bash
   {
  "username": "rob",
  "password": "password123"
   }
- Response:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTg3MDQsImV4cCI6MTczMDk2MjMwNH0.WJVZUOaJfbgYob0Tcu_fkbYaMa2XpLUPaborMCOuBeI"
   }

### Author Endpoints
**1. Create a New Author**
- URL: /authors
- Method: POST
- Description: Adds a new author to the library.
- Request Body:
   ```bash
   {
  "name": "Rob",      
  "token":     "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTg3MDQsImV4cCI6MTczMDk2MjMwNH0.WJVZUOaJfbgYob0Tcu_fkbYaMa2XpLUPaborMCOuBeI"
   }
- Response:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTg5ODIsImV4cCI6MTczMDk2MjU4Mn0.OCe-K003yl_-214oCnPm95O4IZcElEbDEfHfNTVRPTE",
  "message": "Author added successfully"
   }

**2. Get All Authors**
- URL: /authors/get
- Method: GET
- Description: Retrieves a list of all authors.
- Request Body:
   ```bash
   {
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTg5ODIsImV4cCI6MTczMDk2MjU4Mn0.OCe-K003yl_-214oCnPm95O4IZcElEbDEfHfNTVRPTE"
   }
- Response:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTkyMDcsImV4cCI6MTczMDk2MjgwN30.GEERZBqpPpw-Q4x9sDXb8sCbdoyNSk5r9RBxgm6lW0U",
  "data": [
    {
      "authorid": 1,
      "name": "thisisanewauthor"
    },
    {
      "authorid": 2,
      "name": "Author B"
    },
    {
      "authorid": 3,
      "name": "Author C"
    },
    {
      "authorid": 4,
      "name": "Author D"
    },
    {
      "authorid": 5,
      "name": "Author E"
    },
    {
      "authorid": 6,
      "name": "Author F"
    },
    {
      "authorid": 7,
      "name": "Author G"
    },
    {
      "authorid": 8,
      "name": "Author H"
    },
    {
      "authorid": 9,
      "name": "Author I"
    },
    {
      "authorid": 10,
      "name": "Author J"
    },
    {
      "authorid": 11,
      "name": "Author K"
    },
    {
      "authorid": 12,
      "name": "Author L"
    },
    {
      "authorid": 13,
      "name": "Author M"
    },
    {
      "authorid": 14,
      "name": "Author N"
    },
    {
      "authorid": 15,
      "name": "Author O"
    },
    {
      "authorid": 16,
      "name": "Author P"
    },
    {
      "authorid": 17,
      "name": "Author Q"
    },
    {
      "authorid": 18,
      "name": "Author R"
    },
    {
      "authorid": 19,
      "name": "Author S"
    },
    {
      "authorid": 20,
      "name": "Author T"
    },
    {
      "authorid": 21,
      "name": "Author U"
    },
    {
      "authorid": 22,
      "name": "Author V"
    },
    {
      "authorid": 23,
      "name": "Author W"
    },
    {
      "authorid": 24,
      "name": "Author X"
    },
    {
      "authorid": 25,
      "name": "Author Y"
    },
    {
      "authorid": 26,
      "name": "Author Z"
    },
    {
      "authorid": 27,
      "name": "Author AA"
    },
    {
      "authorid": 28,
      "name": "Author BB"
    },
    {
      "authorid": 29,
      "name": "Author CC"
    },
    {
      "authorid": 30,
      "name": "Author DD"
    },
    {
      "authorid": 31,
      "name": "Author EE"
    },
    {
      "authorid": 32,
      "name": "Author FF"
    },
    {
      "authorid": 33,
      "name": "Author GG"
    },
    {
      "authorid": 34,
      "name": "Author HH"
    },
    {
      "authorid": 35,
      "name": "Author II"
    },
    {
      "authorid": 36,
      "name": "Author JJ"
    },
    {
      "authorid": 37,
      "name": "Author KK"
    },
    {
      "authorid": 38,
      "name": "Author LL"
    },
    {
      "authorid": 39,
      "name": "Author MM"
    },
    {
      "authorid": 40,
      "name": "Author NN"
    },
    {
      "authorid": 41,
      "name": "Author OO"
    },
    {
      "authorid": 42,
      "name": "Author PP"
    },
    {
      "authorid": 43,
      "name": "Author QQ"
    },
    {
      "authorid": 44,
      "name": "Author RR"
    },
    {
      "authorid": 45,
      "name": "Author SS"
    },
    {
      "authorid": 46,
      "name": "Author TT"
    },
    {
      "authorid": 47,
      "name": "Author UU"
    },
    {
      "authorid": 48,
      "name": "Author VV"
    },
    {
      "authorid": 49,
      "name": "Author WW"
    },
    {
      "authorid": 50,
      "name": "Author XX"
    },
    {
      "authorid": 51,
      "name": "Author YY"
    },
    {
      "authorid": 52,
      "name": "Author ZZ"
    },
    {
      "authorid": 53,
      "name": "Author AAA"
    },
    {
      "authorid": 54,
      "name": "Author BBB"
    },
    {
      "authorid": 55,
      "name": "Author CCC"
    },
    {
      "authorid": 56,
      "name": "Author DDD"
    },
    {
      "authorid": 57,
      "name": "Author EEE"
    },
    {
      "authorid": 58,
      "name": "Author FFF"
    },
    {
      "authorid": 59,
      "name": "Author GGG"
    },
    {
      "authorid": 60,
      "name": "Author HHH"
    },
    {
      "authorid": 61,
      "name": "Author III"
    },
    {
      "authorid": 62,
      "name": "Author JJJ"
    },
    {
      "authorid": 63,
      "name": "Author KKK"
    },
    {
      "authorid": 64,
      "name": "Author LLL"
    },
    {
      "authorid": 65,
      "name": "Author MMM"
    },
    {
      "authorid": 66,
      "name": "Author NNN"
    },
    {
      "authorid": 67,
      "name": "Author OOO"
    },
    {
      "authorid": 68,
      "name": "Author PPP"
    },
    {
      "authorid": 69,
      "name": "Author QQQ"
    },
    {
      "authorid": 70,
      "name": "Author RRR"
    },
    {
      "authorid": 71,
      "name": "Author SSS"
    },
    {
      "authorid": 72,
      "name": "Author TTT"
    },
    {
      "authorid": 73,
      "name": "Author UUU"
    },
    {
      "authorid": 74,
      "name": "Author VVV"
    },
    {
      "authorid": 75,
      "name": "Author WWW"
    },
    {
      "authorid": 76,
      "name": "Author XXX"
    },
    {
      "authorid": 77,
      "name": "Author YYY"
    },
    {
      "authorid": 78,
      "name": "Author ZZZ"
    },
    {
      "authorid": 79,
      "name": "Author AAAA"
    },
    {
      "authorid": 80,
      "name": "Author BBBB"
    },
    {
      "authorid": 81,
      "name": "Author CCCC"
    },
    {
      "authorid": 82,
      "name": "Author DDDD"
    },
    {
      "authorid": 83,
      "name": "Author EEEE"
    },
    {
      "authorid": 84,
      "name": "Author FFFF"
    },
    {
      "authorid": 85,
      "name": "Author GGGG"
    },
    {
      "authorid": 86,
      "name": "Author HHHH"
    },
    {
      "authorid": 87,
      "name": "Author IIII"
    },
    {
      "authorid": 88,
      "name": "Author JJJJ"
    },
    {
      "authorid": 89,
      "name": "Author KKKK"
    },
    {
      "authorid": 90,
      "name": "Author LLLL"
    },
    {
      "authorid": 91,
      "name": "Author MMMM"
    },
    {
      "authorid": 92,
      "name": "Author NNNN"
    },
    {
      "authorid": 93,
      "name": "Author OOOO"
    },
    {
      "authorid": 94,
      "name": "Author PPPP"
    },
    {
      "authorid": 95,
      "name": "Author QQQQ"
    },
    {
      "authorid": 96,
      "name": "Author RRRR"
    },
    {
      "authorid": 97,
      "name": "Author SSSS"
    },
    {
      "authorid": 98,
      "name": "Author TTTT"
    },
    {
      "authorid": 99,
      "name": "Author UUUU"
    },
    {
      "authorid": 101,
      "name": "J.K. Rowling"
    },
    {
      "authorid": 106,
      "name": "Rob"
    }
  ]
}

**3. Update an Author**
- URL: /authors/update/{id}
- Method: PUT
- Description: Updates an existing author.
- Request Body:
   ```bash
   {
  "name": "New Author Name",
  "token":     "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTkyMDcsImV4cCI6MTczMDk2MjgwN30.GEERZBqpPpw-Q4x9sDXb8sCbdoyNSk5r9RBxgm6lW0U"
   }
- Response:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTk0ODAsImV4cCI6MTczMDk2MzA4MH0.m-Q_YL4FgZXGUh_JfZElqFWMDQgcyj3Fj0wlVKY2PBQ",
  "message": "Author updated successfully"
}

**4. Delete an Author**
- URL: /authors/delete/{id}
- Method: DELETE
- Description: Deletes an author by ID
- Request Body:
   ```bash
   {
  "id": "1",
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTk4OTIsImV4cCI6MTczMDk2MzQ5Mn0.Ef4pn5tHsjjGjJejDB8QQOzRZeT4UpipLTdI3pz13oE"
}
- Response:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAwMzAsImV4cCI6MTczMDk2MzYzMH0.Ma3BxUr6VCmegrFKUYX00fYYU3upHBD10dYMNvA9kF8",
  "message": "Author deleted successfully"
}

### Book Endpoints
**1. Get All Books**
- URL: /books/get
- Method: GET
- Description: Retrieves a list of all books.
- Request Body:
   ```bash
   {
  "username": "rob",
  "password": "password123"
   }
- Response:
   ```bash
   {
  "status": "success",
  "message": "User registered successfully"
   }




















