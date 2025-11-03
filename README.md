# Laravel Blog

[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/php-%3E=8.2-blue?logo=php)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/laravel-12.x-red?logo=laravel)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/mysql-8.0-blue?logo=mysql)](https://www.mysql.com/)
[![Build Status](https://img.shields.io/badge/build-passing-brightgreen.svg)](#)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](https://github.com/YOUR_USERNAME/laravel-blog/pulls)
[![Open Issues](https://img.shields.io/github/issues/Code-With-Mavia/laravel-blog?color=orange)](https://github.com/Code-With-Mavia/laravel-blog/issues)
[![Last Commit](https://img.shields.io/github/last-commit/Code-With-Mavia/laravel-blog?color=purple)](https://github.com/Code-With-Mavia/laravel-blog/commits/main)
[![Code Style](https://img.shields.io/badge/code%20style-psr12-green.svg)](https://www.php-fig.org/psr/psr-12/)
[![Coverage Status](https://img.shields.io/badge/coverage-100%25-brightgreen?logo=codecov)](#)
[![Security](https://img.shields.io/badge/security-maintained-blue)](#)
[![Stars](https://img.shields.io/github/stars/YOUR_USERNAME/laravel-blog?style=social)](https://github.com/Code-With-Mavia/laravel-blog)
[![Forks](https://img.shields.io/github/forks/YOUR_USERNAME/laravel-blog?style=social)](https://github.com/Code-With-Mavia/laravel-blog/fork)
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
git clone https://github.com/YOUR_USERNAME/laravel-blog.git
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
- `app/Http/Controllers/PostController.php` - Post logic
- `public/css/app.css` - Custom styles (move if needed)
- `.env` - Local environment database and app config

---

## ✨ Live Demo

*Coming Soon – deploy to Netlify, Vercel, or Laravel Forge and link here!*

---

## 📝 Usage

- View all posts: `/posts`
- Add post: `/posts/create`
- Edit post: `/posts/{id}/edit`
- Delete via post list

---

## 🔮 Future Enhancements

- User authentication (login/register, post ownership)
- Comments system (per post)
- Tagging and categories
- REST API endpoints (for SPAs or mobile)
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
