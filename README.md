# Real Estate Admin: Multi-Role Auth (Laravel)

The admin side of a real estate platform, built with Laravel. It has three roles (admin, agent, user), each with its own dashboard, plus roles and permissions management and the first property settings.

## Features

- **Three roles:** admin, agent and user, each sent to its own dashboard after login, with role middleware on every route
- **Admin profile:** update your photo, name, email, phone and address, and change your password
- **Property types and amenities:** add, edit and delete them from the admin panel
- **Roles and permissions** with `spatie/laravel-permission`: create permissions and roles, and assign permissions to roles
- **Import and export permissions** as Excel files with `maatwebsite/excel`
- User accounts with a status (active or inactive)
- Laravel Breeze for sign-up, login and password reset

## Main routes

| Path | Who | What it does |
| --- | --- | --- |
| `/admin/login` | – | Admin login |
| `/admin/dashboard` | Admin | Admin dashboard |
| `/admin/profile` | Admin | Edit your profile |
| `/admin/change/password` | Admin | Change your password |
| `/all/type`, `/add/type` | Admin | Property types |
| `/all/amenitis`, `/add/amenitis` | Admin | Amenities |
| `/all/permission`, `/import/permission` | Admin | Permissions, Excel import and export |
| `/all/roles` | Admin | Roles and their permissions |
| `/agent/dashboard` | Agent | Agent dashboard |
| `/dashboard` | User | User dashboard |

## Built with

- PHP 8.1, Laravel 10
- Laravel Breeze
- spatie/laravel-permission
- maatwebsite/excel
- MySQL

## Run it locally

You need PHP 8.1+, Composer, Node.js and MySQL.

```bash
git clone https://github.com/hamzakhalem/laravale_auth.git
cd laravale_auth
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
```

Set `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` in `.env`, then create the tables and the demo accounts:

```bash
php artisan migrate
php artisan db:seed --class=UsersTableSeder
php artisan serve
```

The demo admin, agent and user accounts are defined in `database/seeders/UsersTableSeder.php`.

## Project structure

```
app/Http/Controllers/          Admin, agent, profile controllers
app/Http/Controllers/Backend/  Property types, amenities, roles and permissions
app/Imports, app/Exports       Excel import and export of permissions
resources/views/admin/         Admin dashboard and profile pages
resources/views/agent/         Agent dashboard
```
