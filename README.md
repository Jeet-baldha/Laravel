# Laravel

## Install Laravel
### Install Composer and Laravel Installer
- Follow this <a href="https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04"> link <a/> for install composer
- Paste this in terminal to install <a href="https://laravel.com/docs/11.x/installation">laravel Installer</a>
  ```
   composer global require laravel/installer
   ```

### Create new project using Laravel installer

```
laravel new example-app
```
  If you get error like ***laravel not found*** then folllow this <a href="https://stackoverflow.com/questions/61395786/i-get-laravel-command-not-found-on-ubuntu-20-04">steps</a>
  
After creating Project run this command to start your project

```
cd example-app
npm install && npm run build
composer run dev
```
Or

```
php artisan serve
```

### .env configuration

- go to .env file and change DB configuration
- then clear cache using this command
  ```
  php artisan cache:clear
  ```

## Laravel Tutorial

### [File Structure](https://laravel.com/docs/11.x/structure)

There are some common directories 
- 1 Inside **Routes** folder have **web.php** file where all routes are write ans manage
- 2 In **Resource/views** folder we can put all view or HTML file
- 3 In **Public** folder we can put CSS, JS files and other assest like Images and etc

### [Blade Template](https://laravel.com/docs/11.x/blade#main-content)
 - `{{ data }}` use for display variable data
 - `{!! data !!}` use for same but it prevent XSS attack

### Blade Directives
- `@` symbol use for define directive like `@if`, `@foreach` etc
- dont need to write `<?php ?>` for write php code in html

### [Database Migrations](https://laravel.com/docs/11.x/migrations)

Few migration command whih are frequently use
1. Create migartion
   ` php artisan migrate `
2. Rollback migration
   `php artisan migrate:rollback`
3. Create table in DB
    `php artisan make:migration create_tableName_tabel`
4. Delete all table and re create
   `php artisan migrate:fresh`
5. Perfome task in db
    `php artisan tinker`
6. Create model
    `php artisan make:mode ModelName`
7. Create factory
    `php artisan make:factory factoryName`
8. Insert fake data into db
   `php artisan db:seed`

