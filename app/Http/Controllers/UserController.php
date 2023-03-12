<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class UserController extends Controller
{
   
    public function index()
    {

        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

  
    public function create()
    {
        return view('dashboard.users.create');
    }

  
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
