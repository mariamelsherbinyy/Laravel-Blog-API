
# Laravel Blog API

A RESTful Blog API built with Laravel, providing authentication, role-based access, and CRUD operations for blog posts and comments.

---

## **Installation & Setup**
### 1 **Clone the Repository**
```sh
git clone https://github.com/mariamelsherbinyy/Laravel-Blog-API.git
cd Laravel-Blog-API
2️ Install Dependencies
sh
Copy
Edit
composer install
3️ Set Up Environment
Copy .env.example and create a new .env file:
sh
Copy
Edit
cp .env.example .env
Open .env and configure database settings:
makefile
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_api
DB_USERNAME=root
DB_PASSWORD=
4️⃣ Generate App Key
sh
Copy
Edit
php artisan key:generate
🗄️ Database Setup
5️⃣ Run Migrations & Seed Database
sh
Copy
Edit
php artisan migrate --seed
This will create the necessary tables and seed sample data.

🔐 Authentication
This API uses Laravel Passport for authentication.

6️⃣ Install & Set Up Laravel Passport
sh
Copy
Edit
php artisan passport:install
Add Laravel\Passport\HasApiTokens; to User model:
php
Copy
Edit
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
}
Run:
sh
Copy
Edit
php artisan migrate
7️⃣ Run Database Seeder
sh
Copy
Edit
php artisan db:seed
🚀 Running the API
8️⃣ Start the Laravel Server
sh
Copy
Edit
php artisan serve
The API will be available at http://127.0.0.1:8000/

🔥 API Endpoints
Authentication
Method	Endpoint	Description
POST	/api/register	Register a new user
POST	/api/login	Login and get an access token
POST	/api/logout	Logout the user
Blog Posts
Method	Endpoint	Description
GET	/api/posts	Get all blog posts (paginated)
GET	/api/posts/{id}	Get a single blog post by ID
POST	/api/posts	Create a new blog post (Authenticated users)
PUT	/api/posts/{id}	Update a blog post (Only author or admin)
DELETE	/api/posts/{id}	Delete a blog post (Only author or admin)
Comments
Method	Endpoint	Description
POST	/api/posts/{id}/comments	Add a comment to a post
🛠 Testing the API with Postman
1️⃣ Register a New User
URL: POST http://127.0.0.1:8000/api/register
Body (JSON):
json
Copy
Edit
{
  "name": "John Doe",
  "email": "johndoe@example.com",
  "password": "password123",
  "role": "author"
}
2️⃣ Get an Access Token (Login)
URL: POST http://127.0.0.1:8000/api/login
Body (JSON):
json
Copy
Edit
{
  "email": "johndoe@example.com",
  "password": "password123"
}
Response:
json
Copy
Edit
{
  "token": "your-access-token-here"
}
3️⃣ Use the Token for Authenticated Requests
Go to Postman > Headers and add:
makefile
Copy
Edit
Key: Authorization
Value: Bearer your-access-token-here
🛠 Troubleshooting
❓ "Could not open input file: artisan"
Run:
sh
Copy
Edit
composer dump-autoload
❓ "No application encryption key has been specified."
Run:
sh
Copy
Edit
php artisan key:generate
❓ "SQLSTATE[HY000]: No such table"
Run:
sh
Copy
Edit
php artisan migrate --seed
🎯 Contributing
Feel free to fork and improve this project. Create a pull request for any major changes.

📄 License
This project is licensed under the MIT License.

🎉 Happy Coding! 🚀
yaml
Copy
Edit

---


