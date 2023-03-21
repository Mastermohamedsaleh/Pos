<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Client;
use App\Models\Category;
use App\Models\Order;
use App\Models\Prodect;

class OrderController extends Controller
{
    

    public function index(Request $request){


        $orders = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->paginate(5);
            
    
        return view('dashboard.clients.orders.index', compact('orders'));
    }


    public function create($client_id){
      
        $categories = Category::with('products')->get();

        return view('dashboard.clients.orders.create', compact( 'client_id', 'categories'));

    }


    public function store(Request  $request){
       


     $order = Order::create(['client_id'=>$request->client_id , 'total_price'=>$request->total_price]);

      foreach ($request->products as  $index=>$product){


        $product = Prodect::findOrfail($product);

        $order->products()->attach($product , [ 'quantity'=>$request->quantity[$index] ] );
      
        
        $product->update([
            'stock' => $product->stock - $request->quantity[$index]
        ]);

     }//end foreach



     session()->flash('success', __('site.added_successfully'));
     return redirect()->route('orders');





    }//end store

    public function products(Order $order)
    {

     $products = $order->products;
     return view('dashboard.clients.orders._products', compact('order', 'products'));

    }//end of products



    public function destroy(Order $order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        }//end of for each

        $order->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('orders');
    
    }//end of order



}
