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
**Register a New User**
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
















