<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prodect;
use App\Models\Category;
use File;


class ProdectController extends Controller
{
  
    public function index()
    {

        $products = Prodect::all();
     return view('dashboard.prodects.index',compact('products'));
    }

   
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.prodects.create',compact('categories'));
    }


    public function store(Request $request)
    {
             
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'category_id' => 'required',
            'purchase_price' => 'required|min:1',
            'sale_price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock'=>'required'
        ]);




        $imageName = time().'.'.$request->image->extension(); 

        $products =  new Prodect();

        $products->image =   $imageName;
        $products->category_id = $request->category_id;
        $products->name = ['en'=>$request->name_en , 'ar'=>$request->name_ar];
      
        $products->sale_price = $request->sale_price;
        $products->purchase_price = $request->purchase_price;
        $products->stock = $request->stock;
        $products->save();

        $request->image->move(public_path('uploads/products'), $imageName);


         
    }

 
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {       

        $product = Prodect::findorfail($id);
        $categories = Category::all();

     return view('dashboard.prodects.edit',compact('product','categories'));

        
    }

 
    public function update(Request $request, $id)
    {
 
        $product = Prodect::findorfail($id);

        $product->category_id = $request->category_id;
        $product->name = ['en'=>$request->name_en , 'ar'=>$request->name_ar];
      
        $product->sale_price = $request->sale_price;
        $product->purchase_price = $request->purchase_price;
        $product->stock = $request->stock;




 
        if($request->hasfile('image')){
            $path = 'uploads/products/'.$request->old_image;
            if(File::exists($path)){
                File::delete($path);
            }
            $imageName = time().'.'.$request->image->extension(); 

            $product->image = $imageName;
             
           $request->image->move(public_path('uploads/products'), $imageName);

        }
        
        $product->update();
 
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('prodects.index');
            

    }


    public function destroy($id)
    {
        //
    }
}
