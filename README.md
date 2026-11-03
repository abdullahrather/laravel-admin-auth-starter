# Laravel Admin Auth Starter

A Laravel 10 starter that combines custom session authentication with a ready-made admin dashboard. It is a base for back-office apps: sign-up and sign-in screens, protected routes, and an admin layout with charts, tables and UI components already wired into Blade.

## Features

- **Custom authentication:** sign-up, sign-in and sign-out written by hand with `Auth::attempt` and hashed passwords, rather than a starter kit
- **Route protection:** guest-only routes for the auth pages, and authenticated routes for the dashboard
- **Admin layout** built on SB Admin 2, split into reusable Blade layouts (header, sidebar, footer)
- **Dashboard pages:** charts (Chart.js), tables (DataTables), buttons, cards, colour, border, animation and other utilities
- **Form validation** in the browser with jQuery Validation, and on the server
- **Sweet alerts** for feedback messages

## Tech stack

PHP 8.1+, Laravel 10, MySQL, Blade, SB Admin 2, AdminLTE 3 (auth pages), Bootstrap 4, Chart.js, DataTables and SweetAlert2.

## Getting started

You need PHP 8.1 or newer, Composer and MySQL.

```bash
git clone https://github.com/abdullahrather/laravel-admin-auth-starter.git
cd laravel-admin-auth-starter
composer install
cp .env.example .env
php artisan key:generate
```

Create a database named `laravel_admin_starter`, or set your own in `.env`, then run:

```bash
php artisan migrate
php artisan serve
```

Open http://localhost:8000, create an account on the sign-up page, and you are taken to the dashboard.

## Project layout

| Path | What it holds |
|---|---|
| `app/Http/Controllers/AuthController.php` | Sign-up, sign-in and sign-out |
| `app/Http/Controllers/*Controller.php` | One controller per dashboard section |
| `resources/views/auth` | Sign-up and sign-in pages |
| `resources/views/admin` | Dashboard pages and the shared layout |
| `public/admin`, `public/auth` | Theme assets |

## License

MIT
