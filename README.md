
# Laravel Blog API

A RESTful Blog API built with Laravel, providing authentication, role-based access, and CRUD operations for blog posts and comments.

---
Setup Instructions
# 1 Prerequisites
Ensure you have the following installed:

PHP 8.x
Composer
Laravel 10+
MySQL (or any SQL-based database)
Postman (for testing APIs)

# 2 Clone the repo 
git clone https://github.com/mariamelsherbinyy/Laravel-Blog-API.git
cd Laravel-Blog-API

# 3 Install Dependencies
composer install

# 4 Set Up the Environment (if needed)
Copy the .env.example file to .env and update the database credentials.
cp .env.example .env

Edit the .env file and update these lines with your database credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_api
DB_USERNAME=root
DB_PASSWORD=

# 5 Make applcation key
php artisan key:generate

# 6 Run Migrations & Seeders
php artisan migrate --seed

# 7 Generate JWT Secret Key
php artisan jwt:secret

# 8 Start the Development Server
php artisan serve


# Testing using Postman








