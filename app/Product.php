<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Category;

class Product extends Model
{
    protected $fillable = 
    [
		'image',
		'title',
		'description',
		'price',
		'category_id',
		'availability'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}