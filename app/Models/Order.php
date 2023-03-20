<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;




    protected $fillable = ['client_id','total_price'];
    
    public function client()
    {
        return $this->belongsTo(Client::class);

    }//end of user



    public function products()
    {
        return $this->belongsToMany(Prodect::class, 'product_order')->withPivot('quantity');

    }//end of products
}
