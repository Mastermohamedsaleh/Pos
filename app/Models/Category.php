<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Category extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name'];

    public $translatable = ['name'];


    public function products()
    {
        return $this->hasMany(Prodect::class);

    }//end of products

}
