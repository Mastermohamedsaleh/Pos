<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
   




    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_update'])->only('edit');
        $this->middleware(['permission:users_delete'])->only('destroy');

    }//end of constructor







    public function index(Request $request)
    { 

           
        if($request->search){      
            $users = User::where('name','like','%' . $request->search . '%' )->orwhere('email','like','%'.$request->search . '%')->latest()->paginate(3);
        }else{
            $users = User::whereRoleIs('admin')->paginate(PAGINATE_COUNT);

        }
         

        return view('dashboard.users.index', compact('users'));
    }

  
    public function create()
    {
        return view('dashboard.users.create');
    }

  
    public function store(Request $request)
    {
         
     
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);


        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
         

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('users.index');



    }


    public function show($id)
    {
        //
    }

  
    public function edit(User $user)
    {  
         
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        
         $user = User::findOrFail($id);
 
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'permissions' => 'required|min:1'
        ]);
        

        
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        $user->syncPermissions($request->permissions);

        $user->save();
         
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('users.index');
 

    }


    public function destroy($id)
    {
        //
    }
}
