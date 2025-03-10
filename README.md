
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

 logging in as admin
![Screen Shot 2025-03-10 at 2 41 59 PM](https://github.com/user-attachments/assets/1e60579c-72d0-4893-8318-dd378109ef3d)

Get posts
![Screen Shot 2025-03-10 at 2 42 47 PM](https://github.com/user-attachments/assets/1a94519a-349e-45b5-b843-672132c6cea1)

make a blog post
![Screen Shot 2025-03-10 at 2 43 18 PM](https://github.com/user-attachments/assets/2a10ec3b-8cd0-463f-ae97-bf15c757b4ff)

Logging in as author
![Screen Shot 2025-03-10 at 2 44 03 PM](https://github.com/user-attachments/assets/467a39fc-b2ea-431e-b6d6-abd5fc0c80bd)


delete a post
![Screen Shot 2025-03-10 at 2 45 26 PM](https://github.com/user-attachments/assets/3e40c48d-a84b-4715-85a2-5a1927aa9745)

FILTERING
![Screen Shot 2025-03-10 at 3 13 15 PM](https://github.com/user-attachments/assets/ecaffa90-a72a-43af-b987-c59a47c41e8f)


# Database
Blog posts
![Screen Shot 2025-03-10 at 3 29 16 PM](https://github.com/user-attachments/assets/c049a6a8-dd79-4e52-873d-6be8f536b1b2)


comments 
![Screen Shot 2025-03-10 at 3 29 37 PM](https://github.com/user-attachments/assets/a1b9f96c-6df0-48e1-9961-fb8480df1b27)

migration tables
![Screen Shot 2025-03-10 at 3 30 04 PM](https://github.com/user-attachments/assets/1452d040-8290-47bf-bf77-c7bc8a0b24a2)


users
![Screen Shot 2025-03-10 at 3 30 37 PM](https://github.com/user-attachments/assets/57d23f78-6966-493d-ade5-927974ad48f5)





