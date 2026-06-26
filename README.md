# Cat Store — Laravel E-Commerce Admin Panel

A small e-commerce application built with Laravel 12, featuring product/category management, role-based admin access, and a customer-facing storefront for cat products (food, toys, furniture).

## Features

- **Authentication** — registration, login, password reset (Laravel UI)
- **Role-based access control** — `admin` / `user` roles via a `roles` ↔ `users` pivot table
- **Admin panel** — full CRUD for Products and Categories
- **Storefront** — browse products filtered by category
- **Protected routes** — admin panel restricted to users with the `admin` role via custom middleware

## Tech Stack

- PHP 8.2+, Laravel 12
- MySQL
- Blade templates
- Laravel UI (Bootstrap-based auth scaffolding)

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/ProductController.php
│   │   ├── Admin/CategoryController.php
│   │   └── HomeController.php
│   └── Middleware/IsAdmin.php
├── Models/
│   ├── Product.php
│   ├── Category.php
│   ├── Role.php
│   └── User.php
database/
├── migrations/
└── seeders/DatabaseSeeder.php
resources/views/
├── admin/products/
├── admin/categories/
└── front/
```

## Getting Started

### 1. Clone and install dependencies

```bash
git clone https://github.com/<your-username>/cat-store-laravel.git
cd cat-store-laravel
composer install
npm install
```

### 2. Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cat_store
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Run migrations and seed the database

```bash
php artisan migrate --seed
```

This creates the `admin` and `user` roles, a default admin account, and three starter categories.

> **Default admin login (local development only):**
> Email: `admin@example.com` · Password: `ChangeMe123!`
> Change this immediately if you deploy beyond your local machine.

### 4. Build frontend assets and serve

```bash
npm run build
php artisan serve
```

Visit `http://localhost:8000`.

## Routes Overview

| Route | Description | Access |
|---|---|---|
| `/` | Redirects to storefront | Public → redirects to login if not authenticated |
| `/home/{category_id?}` | Storefront, optionally filtered by category | Authenticated users |
| `/admin/product` | Product CRUD (resource routes) | Admin only |
| `/admin/category` | Category CRUD (resource routes) | Admin only |
| `/login`, `/register` | Auth scaffolding | Public |

## Notes on This Version

This is a cleaned-up version of the original coursework project. Key fixes from the original:

- Removed a duplicate, empty `products` migration that would have wiped the real `products` table schema if migrations were re-run.
- Added the missing `image_url` column to the products migration (previously referenced in code but never defined in the schema).
- Replaced a hardcoded admin-email check in the auth middleware with the existing `roles` relationship already defined on the `User` model.
- Added a real `CategoryController` with full CRUD, replacing a workaround that silently inserted category IDs directly into the database to bypass foreign-key constraints.
- Connected the product create/edit forms to real category data instead of hardcoded `<option>` values.
- Added `.gitignore` and removed the committed `.env` file (which contained a real `APP_KEY`).

## License

MIT — feel free to use this as a learning reference.
