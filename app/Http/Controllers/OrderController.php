<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Client;
use App\Models\Category;
use App\Models\Order;
use App\Models\Prodect;

class OrderController extends Controller
{
    

    public function index(){
        


        
        $orders = Order::paginate(PAGINATE_COUNT);
        
  

        return view('dashboard.clients.orders.index', compact('orders'));
    }


    public function create($client_id){
      
        $categories = Category::with('products')->get();

        return view('dashboard.clients.orders.create', compact( 'client_id', 'categories'));

    }


    public function store(Request  $request){
       


    //   $order = Order::create(['client_id'=>$request->client_id , 'total_price'=>$request->total_price]);

      foreach ($request->products as $index=>$product){



        $product = Prodect::findOrfail($index);
        return $product;

        // $order->products()->attach($product , [ 'quantity'=>$request->quantity[$index] ] );
              

     }



    }

    public function products(Order $order)
    {

     $products = $order->products;
    return view('dashboard.clients.orders._products', compact('order', 'products'));

    }//end of products



}
