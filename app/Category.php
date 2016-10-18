<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Category;

class Category extends Model
{
    protected $table='categories';
   
    protected $fillable=[
    'name',
    
    ];

    public function products()
    {
    	return $this->hasMany('App\Product');
    }
}
