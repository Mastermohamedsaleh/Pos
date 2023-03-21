<?php





function  image(){


    if(auth()->user()->image == 'default.png'){
        $image =  'default.png'; 
    }else{
        $image =  auth()->user()->image;
    }


return $image;

}


