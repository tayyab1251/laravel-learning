# Laravel Posts CRUD

A simple Laravel application for managing blog posts with image upload.

## Features

- Create, Read, Update, Delete posts
- Image upload for post thumbnails
- Paginated post listing (10 per page)
- Form validation with error messages
- Flash notifications
- Bootstrap 5 UI

## Tech Stack

- Laravel
- Bootstrap 5
- MySQL

## Installation

```bash
# Clone the repository
git clone https://github.com/tayyab1251/laravel-learning
cd <project-directory>

# Install dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Run migrations
php artisan migrate

# Create storage link for images
php artisan storage:link

# Start the server
php artisan serve

# Routes
Method	URI	Name	Description
GET	/posts	posts.index	List all posts
GET	/posts/create	posts.create	Show create form
POST	/posts	posts.store	Store new post
GET	/posts/{id}	posts.show	View single post
GET	/posts/{id}/edit	posts.edit	Show edit form
PATCH	/posts/{id}	posts.update	Update post
DELETE	/posts/{id}	posts.destroy	Delete post

# Usage
Visit /posts to see all posts

Click "Create Post" to add a new post

Click "View" to see post details

Click "Edit" to modify a post

Click "Delete" to remove a post

# Validation
Basic Validation Rules with custom Requests are implemented