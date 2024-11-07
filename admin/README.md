# Laravel 8 Boilerplate

Basic boilerplate to create laravel projects with Admin Panel, Role Based Access Control and Dynamic Menus generate.

# Features 

**Generate CRUD with Database Table**

- Provide the related data. And system will automatically create a table in your database and also create it's CRUD in you project.


**Rollback Module**

- You can easily revert back you generated crud.

**Generate CRUD from a created Database Table**

- You should create your table in connected database then generate it's CRUD from the admin panel.

## Whats used?
- **PHP ^8.1.* 
- **Laravel 8.75**
- InfyOm Laravel Generator
- AdminLTE Theme
- DataTables
- Spatie (ACL)
- Repository Pattern

## Libraries
**Laravel 8.75**

- laravel/framework: ^8.75,
- laravel/sanctum: ^2.11,
- laravel/tinker: ^2.5,
- laravel/ui: ^3.4,
- laravelcollective/html: ^6.2,
- doctrine/dbal: ~2.3,

**InfyOm (with AdminLTE Template and DataTables)**

- infyomlabs/adminlte-templates: ^3.0,
- infyomlabs/generator-builder: ^1.0,
- infyomlabs/laravel-generator: ^3.0,
- yajra/laravel-datatables-buttons: ^4.13,
- yajra/laravel-datatables-html: ^4.41,
- yajra/laravel-datatables-oracle: ^9.21,
- infyomlabs/routes-explorer: ^1.0

**Spatie (ACL)**
- spatie/laravel-permission: ^5.7,

## Installation
- Download the zip or Clone this repository 
- Upload it on Web Server
- Goto the project folder
- Create a `.ENV`
- Create a database connect with `.ENV` 
- Install dependencies with `composer install`
- Run Migration and Seeder `php artisan migrate:refresh --seed`
- Run optimize or clear cache commands `php artisan optimize:clear` 

Boilerplate will create tables and insert basic users, roles, permissions in the database. 

**Check Generated Files:**

- DataTable, 
- Admin Controller, 
- Api Controller, 
- Request, 
- Model, 
- Repositories, 
- Migrations, 
- Views, 
- Tests,
- Tests Traits,
- routes/api.php, 
- routes/admin.php,
- resources/model_schemas/Module.json,

## Admin Credentials:
- Super admin (development admin)
    - 'email'    => "super-admin@boilerplate.com"
    - 'password' => '123456'


---
## _Build Something Amazing!!_
