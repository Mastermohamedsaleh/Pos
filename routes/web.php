<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;

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


Auth::routes();



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
 



        
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

         Route::resource('users',UserController::class);
         Route::resource('categories',CategoryController::class);
         Route::resource('prodects',ProdectController::class);
         Route::resource('clients',ClientController::class);
        //  Route::resource('orders',OrderController::class);




        Route::controller(OrderController::class)->group(function() { 
            
            Route::get('orders', 'index');

            Route::get('orders_create/{id}', 'create');
          
            Route::post('orders_store','store');

            Route::get('/orders_products/{order}','products')->name('orders_products');
        });
     

        


    });



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
