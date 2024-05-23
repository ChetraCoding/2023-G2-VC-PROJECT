# POS System

## Description

POS System is a web application built with the Laravel framework. It is designed to provide a robust, scalable, and maintainable application architecture. This project serves as a boilerplate for Laravel applications, including user authentication, role management, and a customizable dashboard.

## Features

- User Authentication
- Role-based Access Control
- Customizable Dashboard
- RESTful API Endpoints
- Responsive Design

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL or another supported database

## Installation

### Steps

1. **Backend:**

Location `./backend/.env`

Database connection
- `DB_CONNECTION`: `"mysql"`.
- `DB_HOST`: `"127.0.0.1"`.
- `DB_PORT`: `"3306"`.
- `DB_DATABASE`: `"example_db"`.
- `DB_USERNAME`: `"root"`.
- `DB_PASSWORD`: `"pwd_example"`.

Mail connection
- `MAIL_MAILER`: `"smtp"`.
- `MAIL_HOST`: `"smtp.gmail.com"`.
- `MAIL_PORT`: `"587"`.
- `MAIL_PASSWORD`: `"secret key"`.
- `MAIL_ENCRYPTION`: `"tls"`.
- `MAIL_FROM_ADDRESS`: `"admin@example.com"`.​
- `MAIL_FROM_NAME`: `"Restaurant Admin"`.​
- `VUE_APP_BASE_URL`: `"http://localhost:8080/"`.​

1. **Frontend:**

Location `./frontend/.env`

Res APIs connection
- `VUE_APP_API_URL`: `"http://127.0.0.1:8000/api/"`.
- `VUE_APP_SOCKET_URL`: `"http://127.0.0.1:8000"`.

Location `./frontend/firebase.js`

Firebase connection
- `apiKey`: `"key"`.
- `authDomain`: `"key"`.
- `projectId`: `"key"`.
- `storageBucket`: `"key"`.
- `messagingSenderId`: `"key"`.
- `appId`: `"key"`.
- `measurementId`: `"key"`.
