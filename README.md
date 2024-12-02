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
- **URL**: /user/register
- **Method**: POST
- **Description**: Registers a new user with username and password
- **Request Body**:
   ```bash
   {
  "username": "rob",
  "password": "password123"
   }
- **Response**:
   ```bash
   {
  "status": "success",
  "message": "User registered successfully"
   }

**2. Authenticate a User**
- **URL**: /user/auth
- **Method**: POST
- **Description**: Authenticates a user and provides an access token.
- **Request Body**:
   ```bash
   {
  "username": "rob",
  "password": "password123"
   }
- **Response**:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTg3MDQsImV4cCI6MTczMDk2MjMwNH0.WJVZUOaJfbgYob0Tcu_fkbYaMa2XpLUPaborMCOuBeI"
   }

### Author Endpoints
**1. Create a New Author**
- **URL**: /authors
- **Method**: POST
- **Description**: Adds a new author to the library.
- **Request Body**:
   ```bash
   {
  "name": "Rob",      
  "token":     "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTg3MDQsImV4cCI6MTczMDk2MjMwNH0.WJVZUOaJfbgYob0Tcu_fkbYaMa2XpLUPaborMCOuBeI"
   }
- **Response**:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTg5ODIsImV4cCI6MTczMDk2MjU4Mn0.OCe-K003yl_-214oCnPm95O4IZcElEbDEfHfNTVRPTE",
  "message": "Author added successfully"
   }

**2. Get All Authors**
- **URL**: /authors/get
- **Method**: GET
- **Description**: Retrieves a list of all authors.
- **Request Body**:
   ```bash
   {
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTg5ODIsImV4cCI6MTczMDk2MjU4Mn0.OCe-K003yl_-214oCnPm95O4IZcElEbDEfHfNTVRPTE"
   }
- **Response**:
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
- **URL**: /authors/update/{id}
- **Method**: PUT
- **Description**: Updates an existing author.
- **Request Body**:
   ```bash
   {
  "name": "New Author Name",
  "token":     "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTkyMDcsImV4cCI6MTczMDk2MjgwN30.GEERZBqpPpw-Q4x9sDXb8sCbdoyNSk5r9RBxgm6lW0U"
   }
- **Response**:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTk0ODAsImV4cCI6MTczMDk2MzA4MH0.m-Q_YL4FgZXGUh_JfZElqFWMDQgcyj3Fj0wlVKY2PBQ",
  "message": "Author updated successfully"
}

**4. Delete an Author**
- **URL**: /authors/delete/{id}
- **Method**: DELETE
- **Description**: Deletes an author by ID
- **Request Body**:
   ```bash
   {
  "id": "1",
   "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTk4OTIsImV4cCI6MTczMDk2MzQ5Mn0.Ef4pn5tHsjjGjJejDB8QQOzRZeT4UpipLTdI3pz13oE"
}
- **Response**:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAwMzAsImV4cCI6MTczMDk2MzYzMH0.Ma3BxUr6VCmegrFKUYX00fYYU3upHBD10dYMNvA9kF8",
  "message": "Author deleted successfully"
}

### Book Endpoints
**1. Get All Books**
- **URL**: /books/get
- **Method**: GET
- **Description**: Retrieves a list of all books.
- **Request Body**:
   ```bash
   {
   "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAwMzAsImV4cCI6MTczMDk2MzYzMH0.Ma3BxUr6VCmegrFKUYX00fYYU3upHBD10dYMNvA9kF8"
}
- **Response**:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAxNDQsImV4cCI6MTczMDk2Mzc0NH0.1Frf64b24XKl-WFx3Bf7rh1HzbH_csGgarESyEaEBqI",
  "data": [
    {
      "bookid": 1,
      "title": "thisisabook",
      "authorid": 23,
      "is_borrowed": 0
    },
    {
      "bookid": 2,
      "title": "Book Title 2",
      "authorid": 2,
      "is_borrowed": 0
    },
    {
      "bookid": 3,
      "title": "Book Title 3",
      "authorid": 3,
      "is_borrowed": 0
    },
    {
      "bookid": 4,
      "title": "Book Title 4",
      "authorid": 4,
      "is_borrowed": 0
    },
    {
      "bookid": 5,
      "title": "hakdog",
      "authorid": 65,
      "is_borrowed": 0
    },
    {
      "bookid": 6,
      "title": "Book Title 6",
      "authorid": 6,
      "is_borrowed": 0
    },
    {
      "bookid": 7,
      "title": "Book Title 7",
      "authorid": 7,
      "is_borrowed": 0
    }
  ]
}

**2. Add a New Book**
- **URL**: /books
- **Method**: POST
- **Description**: Adds a new book to the library.
- **Request Body**:
   ```bash
   {
   "title": "The Wind",
   "author_id": "9",
   "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAxNDQsImV4cCI6MTczMDk2Mzc0NH0.1Frf64b24XKl-WFx3Bf7rh1HzbH_csGgarESyEaEBqI"
}
- **Response**:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAyNDUsImV4cCI6MTczMDk2Mzg0NX0.phQVjYcAIJDDTieLlklxxApPZxrZEzo7W5A4zUDcg4Y",
  "message": "Book added successfully"
}

**3. Update a Book**
- **URL**: /books/update/{id}
- **Method**: PUT
- **Description**: Updates a book in the library.
- **Request Body**:
   ```bash
   {
"id": "8",
  "title": "Brave",
"author_id": "7",
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAyNDUsImV4cCI6MTczMDk2Mzg0NX0.phQVjYcAIJDDTieLlklxxApPZxrZEzo7W5A4zUDcg4Y"
}
- **Response**:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAzNzcsImV4cCI6MTczMDk2Mzk3N30.NH9OXj3KBStsJtUh_89Cja8-2yHhFHucq0hFUs7TEtM",
  "message": "Book updated successfully"
}

**4. Delete a Book**
- **URL**: /books/delete/{id}
- **Method**: PUT
- **Description**: Deletes a book in the library.
- **Request Body**:
   ```bash
   {
"id": "8",
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAzNzcsImV4cCI6MTczMDk2Mzk3N30.NH9OXj3KBStsJtUh_89Cja8-2yHhFHucq0hFUs7TEtM"
   }
- **Response**:
   ```bash
   {
  "status": "success",
  "access_token":     "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjA1MDIsImV4cCI6MTczMDk2NDEwMn0.xUz1CPHIyTg8Ju6lITKAmEyBvyPSQEs6U_ltMhL9E-s",
  "message": "Book deleted successfully"
   }























