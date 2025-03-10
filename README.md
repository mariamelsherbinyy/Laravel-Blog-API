
# Laravel Blog API

A RESTful Blog API built with Laravel, providing authentication, role-based access, and CRUD operations for blog posts and comments.

---
Setup Instructions
# 1 Prerequisites
Ensure you have the following installed:

Install XAMPP
PHP 8.x
Composer
Laravel 10+
MySQL (or any SQL-based database)
Postman (for testing APIs)

# 2 Clone the repo 
git clone https://github.com/mariamelsherbinyy/Laravel-Blog-API.git
cd Laravel-Blog-API

# 3 Move the Project to the XAMPP Directory
For Windows
C:\xampp\htdocs\Laravel-Blog-API
For Linux/Mac
/opt/lampp/htdocs/Laravel-Blog-API  (For Linux/Mac)

# 4 Install Dependencies
composer install

# 5 Set Up the Environment (if needed)
Copy the .env.example file to .env and update the database credentials.
cp .env.example .env

Edit the .env file and update these lines with your database credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_api
DB_USERNAME=root
DB_PASSWORD=


# 6 Start XAMPP’s MySQL Server
Open XAMPP Control Panel.
Click Start next to MySQL.
Open phpMyAdmin by visiting:
http://localhost/phpmyadmin
Create a new database named blog_api.

# 7 Make applcation key
php artisan key:generate

# 8 Run Migrations & Seeders
php artisan migrate --seed

# 9 Generate JWT Secret Key
php artisan jwt:secret

# 10 Start the Development Server
php artisan serve


# Testing using Postman

Registering admin
![Screen Shot 2025-03-10 at 2 41 01 PM](https://github.com/user-attachments/assets/5a4fa61d-d81e-4e20-af6c-ce9a2fbaea67)







