<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;


use File;

class SettingController extends Controller
{
     

     public function index($id){
 

        
        if($id != auth()->user()->id ){
            return   redirect()->route('home');
        }

          $user =  User::findOrfail($id);


        return view('dashboard.users.profile' ,compact('user') );




         
         
     }



     public function update(Request $request ,$id){

        $user =  User::findOrfail($id);

        



    if( $request->old_image !== 'default.png'  ){

        if(File::exists(public_path('uploads/users/'.$request->old_image))){
        File::delete(public_path('uploads/users/'.$request->old_image));
        }

    }
    
    

    
    $imageName = time().'.'.$request->new_image->extension(); 
    $request->new_image->move(public_path('uploads/users'), $imageName);


       $user->image =    $imageName ;

        $user->update();

    return   redirect()->route('home');


     }
     
}
