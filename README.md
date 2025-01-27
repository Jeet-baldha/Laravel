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

Few migration command which are frequently use
1. Create migartion
   ` php artisan migrate `
2. Rollback migration
   ` php artisan migrate:rollback `
3. Create table in DB
    ` php artisan make:migration create_tableName_tabel `
4. Delete all table and re create
   ` php artisan migrate:fresh `
5. Perfome task in db
    ` php artisan tinker `
6. Create model
    `php artisan make:mode ModelName`
7. Create factory
    ` php artisan make:factory factoryName `
8. Insert fake data into db
   ` php artisan db:seed `

-- **Note** factory name and class name must be same with suffix Factory and in Model class define *HasFactory* method


- Migration use for DB mangment and mange table
- **App\Model\TableClass** file define db table schema and relation with other table
- Factory use for seed data into DB
- Using `db:seed` command insert data into DB or also use when DB fresh ans insert to new data `php artisan migrate:fresh --seed` this command drop all table and create new and insert data

### [Laravel Component](https://laravel.com/docs/11.x/blade#components)
- Component is part of blade template
- Simplest method to create component is just create new directory in **resource/view** and create blade file
- Now you can use this component in any view file using **&lt;x-componentName&gt;**
- For pass data into comopoenet use prop **&lt;x-componentName :data="$data" &gt;**
- <pre>
  &lt;x-layout&gt;
    some html code
  &lt;/x-layout&gt;
</pre>
it is use for layout webpage but need to write `{{ $data }}` it is defualt variable for pass other html content

### [Controllers](https://laravel.com/docs/11.x/controllers#main-content)
- In controller we write all request handle logic in controller file 
- For create component
  ```
  php artisan make:controller controllername
  ```
- Pass controller in route request
  <pre>
    Route::get('/', [PostController::class, 'index']);
  </pre>
  here index is separate logic for request
- Example
  <pre>
        public function index()
    {
        $posts = Post::latest();

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
        return view('home', [
            'posts' => $posts->get(),
            'categories' => Category::all()
        ]);
    }
  </pre>
  it is simple logic for search functionality

### [DB Query](https://laravel.com/docs/11.x/queries#main-content)

- ` ModelName->all() ` get all data from tabel
- ` ModelName->where('columnName','matchData') ` find specific row from tabel

## Table Relation
- In Model class write function with realtion name and return relation between two table
    <pre>
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    </pre>
    pass model class which has relaton with this table, in this code category is relation, if i wanto get category of post just write post->category
  
  - One to one `belogsTo`
  - One to many `hasMany`
  - Many to many `belogsToMany`
 
### [N + 1 query issue](https://medium.com/@moumenalisawe/n-1-query-problem-in-laravel-causes-effects-and-solutions-740cefa44306)
- N + 1 query problem occur when two tabel have realtion and we want to get data using Post->all() it run N + 1 query 1 for post and N quries for category
 <pre>
   1 - select * from posts
   N - select * from categories where id = ''
 </pre>
- For solve this we need to use `with()` method just pass table name as parameter which you want it reduce number of query from N + 1 to  2
<pre>
    1 - select * from posts
    2 - select * from categories where id in(1,2,3,..)
</pre>

### Pagination
- In laravel pagination is very easy just use `paginate($n)` method and here n is number of data per page

### Session and Authentication
- Laravel provide inbuilt method to mange authentication `auth()`
- ` auth()->login() `
- ` auth()->logout() `
- ` session('key','data') ` for store data in session variable

### Form validation

- Using ` request() ` you get all request body data
- ` request()->validate([]) ` method for validation and it has some pre build rules
  <pre>
    request()->validate(
            [
                'name' => 'required',
                'username' => 'required|max:255|min:4|unique:users,username',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required'
            ]
        );
  </pre>
- And insert data into table just write $post->create(request())


### File Upload
 - Submit form with encrypt=multipart/form-data
 - Get file with request method `` request()->file(name) ``
 - And for save file in server just add one more method store `` request()->file(name)->store(foldername) ``
 - File will be save in **stoarage/app/private/foldername/filename**
 - If you want to save file in public then go to **config/filesystem.php** and change defualt disk local to public and also change in .env file FILESYSTEM_DISK=public
  
