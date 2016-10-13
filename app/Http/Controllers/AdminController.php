<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Stripe\Stripe;
use Stripe\Charge;
use App\Product;
use App\Cart;
use App\Orders;
use App\Category;
use Session;
use Auth;
use Image;

class AdminController extends Controller
{
    public function getProductCreate(){
        $categories=array();
        foreach (Category::all() as $category) {
          $categories[$category->id]=$category->name;
        }
        return view('admin.product')
        ->with('products', Product::all())
        ->with('categories', $categories);  
    }

    public function postCreate(Request $request){
      $file=$request->file('image');
        $this->validate($request,[
        'category_id'=>'required|max:255',
        'title'=>'required|max:255',
        'description'=>'required|max:255',
        'price'=>'required|max:255',
        'availability'=>'required|max:255',
        'image'=>'required|max:255',
      ]);

      $filename =date('Y-m-d-H:i:s')."-".$file->getClientOriginalName();
      Image::make($file)->resize(300,300)->save( public_path('/uploads/products/images/' . $filename ) );
      //$file->move('products/images/',$filename);
     Product::create([
       'category_id'=> $request->input('category_id'),
       'title'=> $request->input('title'),
       'description'=> $request->input('description'),
       'price'=> $request->input('price'),
       'availability'=> $request->input('availability'),
       'image'=> $filename,
      ]);

     return redirect()->back()
     ->with('product', 'Product created.!');   
    }


  public function getAllProducts(){
    $products = Product::all();
    return view('admin.manageproduct',['products' => $products]);

  }
}
