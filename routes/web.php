<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

define('PAGINATE_COUNT' , 5 );


Auth::routes(['register'=>false]);



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
 



        
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        // Users
         Route::resource('users',UserController::class);
        //  Categories
         Route::resource('categories',CategoryController::class);
        //  Products
         Route::resource('prodects',ProdectController::class);
        //  Clients
         Route::resource('clients',ClientController::class);

         




// Order
        Route::controller(OrderController::class)->group(function() { 
            
            Route::get('orders', 'index')->name('orders');

            Route::get('orders_create/{id}', 'create');
          
            Route::post('orders_store','store');

            Route::get('/orders_products/{order}','products')->name('orders_products');

            Route::post('orders_destroy/{order}','destroy')->name('orders_destroy');

        });

// Setting
     
Route::controller(SettingController::class)->group(function() { 

     Route::get('setting/{id}', 'index');
     Route::post('setting_update/{id}', 'update');
});



        


    });



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
