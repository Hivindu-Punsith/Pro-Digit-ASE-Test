# Laravel Project Setup

This repository contains the source code for ASE Test Project, a web application built using the Laravel framework.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.1
- Composer installed
- Node.js and npm installed
- MySQL database

## Getting Started


1. **Install PHP dependencies:**

    ```bash
    composer install
    ```

2. **Create a copy of the `.env` file:**

    ```bash
    cp .env.example .env
    ```

    Update the database and other configuration settings in the `.env` file.

3. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

4. **Run the database migrations and seed the database:**

    ```bash
    php artisan migrate --seed
    ```

5. **Start the development server:**

    ```bash
    php artisan serve
    ```

    The application should now be running at [http://localhost:8000](http://localhost:8000).

