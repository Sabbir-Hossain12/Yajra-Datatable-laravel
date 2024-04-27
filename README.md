# Steps for How to Install and Use Yajra Datatables in Laravel 11

## Step 1: Download the New Laravel Application

Run `composer create-project --prefer-dist laravel/laravel LaravelDataTables` command on cmd to download and setup new Laravel application into your system:

```bash
composer create-project --prefer-dist laravel/laravel LaravelDataTables
```

## Step 2: Configure the Database with the Application

Open .env file from root folder of laravel project, and configure database details into it; something like this:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_pass
```

## Step 3: Install Yajra DataTables Package

Run the composer require yajra/laravel-datatables-oracle command on cmd to install yajra dataTables in laravel project:
```bash
cd LaravelDataTables
composer require yajra/laravel-datatables-oracle
```

## Step 4: Add Dummy Data on Database

Run the following command on cmd to generate fake data for testing Yajra dataTables in the laravel project; something like this:

```bash
php artisan tinker
  
User::factory()->count(50)->create()
```

## Step 5: Create Controller File

Run php artisan make:controller MyTestController command on cmd to create a new controller file:

```bash
php artisan make:controller MyTestController
```
Now open MyTestController.php file from app/http/controllers folder, and create one method to pass data on dataTable views; something like this:

```bash
<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;

use App\Models\User;

use DataTables;
  
class MyTestController extends Controller
{
    /**
     //handle yajra datatable views and data
     */
    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select('*');
            return datatables()->of($users)
                ->make(true);
        }
          
        return view('y-dataTables');
    }
}
```
## Step 6: Define Routes

Open web.php file from routes folder, and create route in it to handle logic between controller and view file; something like this:

```bash
<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\MyTestController;
  
Route::get('list', [MyTestController::class, 'dataTableLogic']);
```
## Step 7: Create View

To create view file name y-dataTables.blade.php in resources/views folder to show dataTables with data from database; something like this:

```bash
<!DOCTYPE html>

<html lang="en">
<head>
<title>Laravel 11 DataTables Example - Tutsmake.com</title>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>
      <body>
         <div class="container">
               <h2>Laravel 11 DataTables Example - Tutsmake.com</h2>
            <table class="table table-bordered" id="y_dataTables">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Created at</th>
                  </tr>
               </thead>
            </table>
         </div>
   <script>
   $(document).ready( function () {
    $('#y_dataTables').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('list') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' }
                 ]
        });
     });
  </script>
   </body>
</html>
```
## Step 8: Run and Test Application

Run php artisan serve command on cmd to start application server:

```bash
php artisan serve
```
Ready to run this app at http://127.0.0.1:8000/list URL on browser:

```bash
http://127.0.0.1:8000/list
```

