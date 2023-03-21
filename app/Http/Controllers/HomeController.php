<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Prodect;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {

        $categories_count = Category::count();
        $products_count = Prodect::count();
        $clients_count = Client::count();
        $users_count = User::whereRoleIs('admin')->count();
        return view('home',compact('categories_count', 'products_count', 'clients_count', 'users_count'));
    }
}
