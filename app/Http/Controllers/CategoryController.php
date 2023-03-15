<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
  
    public function index()
    {
        $categories =   Category::all();
        return view('dashboard.category.index', compact('categories'));
    }

  
    public function create()
    {
        return view('dashboard.category.create');
    }

  
    public function store(Request $request)
    {
           
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);        

        $category = new Category();

        $category->name = ['en'=>$request->name_en , 'ar'=>$request->name_ar];
 
            $category->save();

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('categories.index');
 
          
    }

    public function show($id)
    {
        //
    }

 
    public function edit(Category $category )
    {
     
     

        return view('dashboard.category.edit', compact('category'));

        
    }


    public function update(Request $request, $id)
    {
        
        $category =  category::findOrfail($id);

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);        

        $category->name = ['en'=>$request->name_en , 'ar'=>$request->name_ar];
 
        $category->save();

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('categories.index');
         
    }


    public function destroy($id)
    {
         
        $category = Category::findOrfail($id);
        
        $category->delete();

        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('categories.index');
 
         
    }
}
