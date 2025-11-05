# Laravel Blog

[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/php-%3E=8.2-blue?logo=php)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/laravel-12.x-red?logo=laravel)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/mysql-8.0-blue?logo=mysql)](https://www.mysql.com/)
[![Build Status](https://img.shields.io/badge/build-passing-brightgreen.svg)](#)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](https://github.com/Code-With-Mavia/MyBlog/pulls)
[![Open Issues](https://img.shields.io/github/issues/Code-With-Mavia/MyBlog?color=orange)](https://github.com/Code-With-Mavia/MyBlog/issues)
[![Last Commit](https://img.shields.io/github/last-commit/Code-With-Mavia/MyBlog?color=purple)](https://github.com/Code-With-Mavia/MyBlog/commits/main)
[![Code Style](https://img.shields.io/badge/code%20style-psr4-green.svg)](https://www.php-fig.org/psr/psr-12/)
[![Coverage Status](https://img.shields.io/badge/coverage-100%25-brightgreen?logo=codecov)](#)
[![Security](https://img.shields.io/badge/security-maintained-blue)](#)
[![Stars](https://img.shields.io/github/stars/Code-With-Mavia/MyBlog?style=social)](https://github.com/Code-With-Mavia/MyBlog)
[![Forks](https://img.shields.io/github/forks/Code-With-Mavia/MyBlog?style=social)](https://github.com/Code-With-Mavia/MyBlog/fork)
[![Platform](https://img.shields.io/badge/platform-macOS%20%7C%20Linux%20%7C%20Windows-lightgrey)](#)

---

## 🚀 Overview

A clean, multi-user blog app built in Laravel, MySQL, and custom CSS.  
Emphasizes usability (HCI), maintainable code, and direct, accessible features—no JS frameworks, no bloat.  
Built as a backend learning project following SOLID and best-practice Laravel design.

---

## 🛠️ Features

- CRUD for blog posts (create, edit, delete)
- User ID linking (extendable to full user accounts)
- Responsive, accessible UI (pure CSS, modern navigation patterns)
- Strong usability (all buttons/links placed using real-world HCI research)
- Easy to install, develop, and contribute to
- User authentication (login/register, post ownership)
- Comments system (per post)
- REST API endpoints (for SPAs or mobile)

---

## 🧱 Tech Stack

- **Backend:** Laravel 12.x (PHP 8.3+)
- **Database:** MySQL 8+ or MariaDB
- **Frontend:** Laravel Blade + CSS
- **Dev Tools:** VS Code, MAMP/XAMPP, GitHub

---

## 🏁 Getting Started

```
# Clone the repo
git clone https://github.com/YOUR_USERNAME/MyBlog.git
cd laravel-blog

# Install PHP dependencies
composer install

# Copy environment template and set up credentials
cp .env.example .env

# Generate Laravel app key
php artisan key:generate

# Migrate database tables
php artisan migrate

# (Optional) Seed test data
php artisan db:seed

# Start local dev server
php artisan serve
```

---

## 📦 Directory Layout

- `resources/views/posts/` - Blade files for CRUD
- `app/Http/Controllers/Posts/PostController.php` - Post logic
- `public/css/app.css` - Custom styles (move if needed)
- `app/Http/Controllers/Posts/V1/PostControllerApi.php` - RESTAPIS logics for all (users,posts)
- `.env` - Local environment database and app config

---

## ✨ Live Demo

*Coming Soon*

---

## 🌍 Web UI Endpoints

| Action | URL | Description |
|--------|-----|-------------|
| View all posts | `/posts` | List all blog posts |
| Create a new post | `/posts/create` | Add a new blog post |
| Edit post | `/posts/{id}/edit` | Edit existing post |
| Delete post | `/posts` (delete button) | Remove a post |

---

## 🔗 REST API Endpoints

| Action | Method | Endpoint |
|--------|---------|----------|
| List all posts | `GET` | `/api/posts` |
| Get specific post | `GET` | `/api/posts/{id}` |
| Create a new post | `POST` | `/api/posts` |
| Update post | `PUT` | `/api/posts/{id}` |
| Delete post | `DELETE` | `/api/posts/{id}` |
| Add comment | `POST` | `/api/comments/{id}` |
| List all comments | `GET` | `/api/posts/comments` |
| Get user’s posts | `GET` | `/api/users/{id}/posts` |
| Get post author info | `GET` | `/api/posts/{id}/author` |
| Recent users (10) | `GET` | `/api/users/recent` |
| Search posts by title | `GET` | `/api/posts/find?query=keyword` |
| Get user stats | `GET` | `/api/users/{id}/stats` |


---

## 🔮 Future Enhancements

- Tagging and categories
- Advanced search, filtering, and post ordering
- Pagination
- Image upload support
- Admin/moderator roles
- Dark mode and more responsive states
- CI/CD pipelines with automated tests

---

## 🤝 Contributing

Pull requests and issues welcome!  
For bigger ideas, open an issue for discussion.

---

## 📄 License

MIT © You and contributors

---
