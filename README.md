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
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAwMzAsImV4cCI6MTczMDk2MzYzMH0.Ma3BxUr6VCmegrFKUYX00fYYU3upHBD10dYMNvA9kF8"
}
- Response:
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
    },
    {
      "bookid": 8,
      "title": "Book Title 8",
      "authorid": 8,
      "is_borrowed": 0
    },
    {
      "bookid": 9,
      "title": "Book Title 9",
      "authorid": 9,
      "is_borrowed": 0
    },
    {
      "bookid": 10,
      "title": "Book Title 10",
      "authorid": 10,
      "is_borrowed": 0
    },
    {
      "bookid": 11,
      "title": "Book Title 11",
      "authorid": 11,
      "is_borrowed": 0
    },
    {
      "bookid": 12,
      "title": "Book Title 12",
      "authorid": 12,
      "is_borrowed": 0
    },
    {
      "bookid": 13,
      "title": "Book Title 13",
      "authorid": 13,
      "is_borrowed": 1
    },
    {
      "bookid": 14,
      "title": "Book Title 14",
      "authorid": 14,
      "is_borrowed": 0
    },
    {
      "bookid": 15,
      "title": "Book Title 15",
      "authorid": 15,
      "is_borrowed": 0
    },
    {
      "bookid": 16,
      "title": "Book Title 16",
      "authorid": 16,
      "is_borrowed": 0
    },
    {
      "bookid": 17,
      "title": "Book Title 17",
      "authorid": 17,
      "is_borrowed": 0
    },
    {
      "bookid": 18,
      "title": "Book Title 18",
      "authorid": 18,
      "is_borrowed": 0
    },
    {
      "bookid": 19,
      "title": "Book Title 19",
      "authorid": 19,
      "is_borrowed": 0
    },
    {
      "bookid": 20,
      "title": "Book Title 20",
      "authorid": 20,
      "is_borrowed": 0
    },
    {
      "bookid": 21,
      "title": "Book Title 21",
      "authorid": 21,
      "is_borrowed": 0
    },
    {
      "bookid": 22,
      "title": "Book Title 22",
      "authorid": 22,
      "is_borrowed": 0
    },
    {
      "bookid": 23,
      "title": "Book Title 23",
      "authorid": 23,
      "is_borrowed": 0
    },
    {
      "bookid": 24,
      "title": "Book Title 24",
      "authorid": 24,
      "is_borrowed": 0
    },
    {
      "bookid": 25,
      "title": "Book Title 25",
      "authorid": 25,
      "is_borrowed": 0
    },
    {
      "bookid": 26,
      "title": "Book Title 26",
      "authorid": 26,
      "is_borrowed": 0
    },
    {
      "bookid": 27,
      "title": "Book Title 27",
      "authorid": 27,
      "is_borrowed": 0
    },
    {
      "bookid": 28,
      "title": "Book Title 28",
      "authorid": 28,
      "is_borrowed": 0
    },
    {
      "bookid": 29,
      "title": "Book Title 29",
      "authorid": 29,
      "is_borrowed": 0
    },
    {
      "bookid": 30,
      "title": "Book Title 30",
      "authorid": 30,
      "is_borrowed": 0
    },
    {
      "bookid": 31,
      "title": "Book Title 31",
      "authorid": 31,
      "is_borrowed": 0
    },
    {
      "bookid": 32,
      "title": "Book Title 32",
      "authorid": 32,
      "is_borrowed": 0
    },
    {
      "bookid": 33,
      "title": "Book Title 33",
      "authorid": 33,
      "is_borrowed": 0
    },
    {
      "bookid": 34,
      "title": "Book Title 34",
      "authorid": 34,
      "is_borrowed": 0
    },
    {
      "bookid": 35,
      "title": "Book Title 35",
      "authorid": 35,
      "is_borrowed": 0
    },
    {
      "bookid": 36,
      "title": "Book Title 36",
      "authorid": 36,
      "is_borrowed": 0
    },
    {
      "bookid": 37,
      "title": "Book Title 37",
      "authorid": 37,
      "is_borrowed": 0
    },
    {
      "bookid": 38,
      "title": "Book Title 38",
      "authorid": 38,
      "is_borrowed": 0
    },
    {
      "bookid": 39,
      "title": "Book Title 39",
      "authorid": 39,
      "is_borrowed": 0
    },
    {
      "bookid": 40,
      "title": "Book Title 40",
      "authorid": 40,
      "is_borrowed": 0
    },
    {
      "bookid": 41,
      "title": "Book Title 41",
      "authorid": 41,
      "is_borrowed": 0
    },
    {
      "bookid": 42,
      "title": "Book Title 42",
      "authorid": 42,
      "is_borrowed": 0
    },
    {
      "bookid": 43,
      "title": "Book Title 43",
      "authorid": 43,
      "is_borrowed": 0
    },
    {
      "bookid": 44,
      "title": "Book Title 44",
      "authorid": 44,
      "is_borrowed": 0
    },
    {
      "bookid": 45,
      "title": "Book Title 45",
      "authorid": 45,
      "is_borrowed": 0
    },
    {
      "bookid": 46,
      "title": "Book Title 46",
      "authorid": 46,
      "is_borrowed": 0
    },
    {
      "bookid": 47,
      "title": "Book Title 47",
      "authorid": 47,
      "is_borrowed": 0
    },
    {
      "bookid": 48,
      "title": "Book Title 48",
      "authorid": 48,
      "is_borrowed": 0
    },
    {
      "bookid": 49,
      "title": "Book Title 49",
      "authorid": 49,
      "is_borrowed": 0
    },
    {
      "bookid": 50,
      "title": "Book Title 50",
      "authorid": 50,
      "is_borrowed": 0
    },
    {
      "bookid": 51,
      "title": "Book Title 51",
      "authorid": 51,
      "is_borrowed": 0
    },
    {
      "bookid": 52,
      "title": "Book Title 52",
      "authorid": 52,
      "is_borrowed": 0
    },
    {
      "bookid": 53,
      "title": "Book Title 53",
      "authorid": 53,
      "is_borrowed": 0
    },
    {
      "bookid": 54,
      "title": "Book Title 54",
      "authorid": 54,
      "is_borrowed": 0
    },
    {
      "bookid": 55,
      "title": "Book Title 55",
      "authorid": 55,
      "is_borrowed": 0
    },
    {
      "bookid": 56,
      "title": "Book Title 56",
      "authorid": 56,
      "is_borrowed": 0
    },
    {
      "bookid": 57,
      "title": "Book Title 57",
      "authorid": 57,
      "is_borrowed": 0
    },
    {
      "bookid": 58,
      "title": "Book Title 58",
      "authorid": 58,
      "is_borrowed": 0
    },
    {
      "bookid": 59,
      "title": "Book Title 59",
      "authorid": 59,
      "is_borrowed": 0
    },
    {
      "bookid": 60,
      "title": "Book Title 60",
      "authorid": 60,
      "is_borrowed": 0
    },
    {
      "bookid": 61,
      "title": "Book Title 61",
      "authorid": 61,
      "is_borrowed": 0
    },
    {
      "bookid": 62,
      "title": "Book Title 62",
      "authorid": 62,
      "is_borrowed": 0
    },
    {
      "bookid": 63,
      "title": "Book Title 63",
      "authorid": 63,
      "is_borrowed": 0
    },
    {
      "bookid": 64,
      "title": "Book Title 64",
      "authorid": 64,
      "is_borrowed": 0
    },
    {
      "bookid": 65,
      "title": "Book Title 65",
      "authorid": 65,
      "is_borrowed": 0
    },
    {
      "bookid": 66,
      "title": "Book Title 66",
      "authorid": 66,
      "is_borrowed": 0
    },
    {
      "bookid": 67,
      "title": "Book Title 67",
      "authorid": 67,
      "is_borrowed": 0
    },
    {
      "bookid": 68,
      "title": "Book Title 68",
      "authorid": 68,
      "is_borrowed": 0
    },
    {
      "bookid": 69,
      "title": "Book Title 69",
      "authorid": 69,
      "is_borrowed": 0
    },
    {
      "bookid": 70,
      "title": "Book Title 70",
      "authorid": 70,
      "is_borrowed": 1
    },
    {
      "bookid": 71,
      "title": "Book Title 71",
      "authorid": 71,
      "is_borrowed": 0
    },
    {
      "bookid": 72,
      "title": "Book Title 72",
      "authorid": 72,
      "is_borrowed": 0
    },
    {
      "bookid": 73,
      "title": "Book Title 73",
      "authorid": 73,
      "is_borrowed": 0
    },
    {
      "bookid": 74,
      "title": "Book Title 74",
      "authorid": 74,
      "is_borrowed": 0
    },
    {
      "bookid": 75,
      "title": "Book Title 75",
      "authorid": 75,
      "is_borrowed": 0
    },
    {
      "bookid": 76,
      "title": "Book Title 76",
      "authorid": 76,
      "is_borrowed": 0
    },
    {
      "bookid": 77,
      "title": "Book Title 77",
      "authorid": 77,
      "is_borrowed": 0
    },
    {
      "bookid": 78,
      "title": "Book Title 78",
      "authorid": 78,
      "is_borrowed": 0
    },
    {
      "bookid": 79,
      "title": "Book Title 79",
      "authorid": 79,
      "is_borrowed": 0
    },
    {
      "bookid": 80,
      "title": "Book Title 80",
      "authorid": 80,
      "is_borrowed": 0
    },
    {
      "bookid": 81,
      "title": "Book Title 81",
      "authorid": 81,
      "is_borrowed": 0
    },
    {
      "bookid": 82,
      "title": "Book Title 82",
      "authorid": 82,
      "is_borrowed": 0
    },
    {
      "bookid": 83,
      "title": "Book Title 83",
      "authorid": 83,
      "is_borrowed": 0
    },
    {
      "bookid": 84,
      "title": "Book Title 84",
      "authorid": 84,
      "is_borrowed": 0
    },
    {
      "bookid": 85,
      "title": "Book Title 85",
      "authorid": 85,
      "is_borrowed": 0
    },
    {
      "bookid": 86,
      "title": "Book Title 86",
      "authorid": 86,
      "is_borrowed": 0
    },
    {
      "bookid": 87,
      "title": "Book Title 87",
      "authorid": 87,
      "is_borrowed": 0
    },
    {
      "bookid": 88,
      "title": "Book Title 88",
      "authorid": 88,
      "is_borrowed": 0
    },
    {
      "bookid": 89,
      "title": "Book Title 89",
      "authorid": 89,
      "is_borrowed": 1
    },
    {
      "bookid": 90,
      "title": "Book Title 90",
      "authorid": 90,
      "is_borrowed": 1
    },
    {
      "bookid": 91,
      "title": "Book Title 91",
      "authorid": 91,
      "is_borrowed": 0
    },
    {
      "bookid": 92,
      "title": "Book Title 92",
      "authorid": 92,
      "is_borrowed": 0
    },
    {
      "bookid": 93,
      "title": "Book Title 93",
      "authorid": 93,
      "is_borrowed": 0
    },
    {
      "bookid": 94,
      "title": "Book Title 94",
      "authorid": 94,
      "is_borrowed": 0
    },
    {
      "bookid": 95,
      "title": "Book Title 95",
      "authorid": 95,
      "is_borrowed": 0
    },
    {
      "bookid": 96,
      "title": "Book Title 96",
      "authorid": 96,
      "is_borrowed": 0
    },
    {
      "bookid": 97,
      "title": "Book Title 97",
      "authorid": 97,
      "is_borrowed": 0
    },
    {
      "bookid": 98,
      "title": "Book Title 98",
      "authorid": 98,
      "is_borrowed": 0
    },
    {
      "bookid": 99,
      "title": "Book Title 99",
      "authorid": 99,
      "is_borrowed": 0
    },
    {
      "bookid": 140,
      "title": "The Great Gatsby",
      "authorid": 5,
      "is_borrowed": 0
    },
    {
      "bookid": 141,
      "title": "The Great Gatsby",
      "authorid": 83,
      "is_borrowed": 0
    },
    {
      "bookid": 144,
      "title": "book101",
      "authorid": 99,
      "is_borrowed": 0
    },
    {
      "bookid": 145,
      "title": "thisisabook",
      "authorid": 77,
      "is_borrowed": 0
    },
    {
      "bookid": 146,
      "title": "thisisabook",
      "authorid": 77,
      "is_borrowed": 0
    },
    {
      "bookid": 147,
      "title": "thisisabook",
      "authorid": 77,
      "is_borrowed": 0
    },
    {
      "bookid": 148,
      "title": "thebook",
      "authorid": 5,
      "is_borrowed": 0
    }
  ]
}

**2. Add a New Book**
- URL: /books
- Method: POST
- Description: Adds a new book to the library.
- Request Body:
   ```bash
   {
"title": "The Wind",
  "author_id": "9",
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAxNDQsImV4cCI6MTczMDk2Mzc0NH0.1Frf64b24XKl-WFx3Bf7rh1HzbH_csGgarESyEaEBqI"
}
- Response:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAyNDUsImV4cCI6MTczMDk2Mzg0NX0.phQVjYcAIJDDTieLlklxxApPZxrZEzo7W5A4zUDcg4Y",
  "message": "Book added successfully"
}

**3. Update a Book**
- URL: /books/update/{id}
- Method: PUT
- Description: Updates a book in the library.
- Request Body:
   ```bash
   {
"id": "8",
  "title": "Brave",
"author_id": "7",
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAyNDUsImV4cCI6MTczMDk2Mzg0NX0.phQVjYcAIJDDTieLlklxxApPZxrZEzo7W5A4zUDcg4Y"
}
- Response:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAzNzcsImV4cCI6MTczMDk2Mzk3N30.NH9OXj3KBStsJtUh_89Cja8-2yHhFHucq0hFUs7TEtM",
  "message": "Book updated successfully"
}

**4. Delete a Book**
- URL: /books/delete/{id}
- Method: PUT
- Description: Deletes a book in the library.
- Request Body:
   ```bash
   {
"id": "8",
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjAzNzcsImV4cCI6MTczMDk2Mzk3N30.NH9OXj3KBStsJtUh_89Cja8-2yHhFHucq0hFUs7TEtM"
}
- Response:
   ```bash
   {
  "status": "success",
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NjA1MDIsImV4cCI6MTczMDk2NDEwMn0.xUz1CPHIyTg8Ju6lITKAmEyBvyPSQEs6U_ltMhL9E-s",
  "message": "Book deleted successfully"
}























