<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    public function getCategory(){
    	return view('admin.category');
    }
    
    public function postCreate(Request $request){
	 
	   $this->validate($request,[
	      'name'=>'required|max:255', 
	   	]);

	   Category::create([
	     'name'=> $request->input('name'),     
	   	]);

	   return redirect()->back()
	   ->with('category', 'Category created.!');
	}

	public function getManageCategory(){
        return view('admin.categorymanage')
        ->with('categories', Category::all());
    }

    public function postDeleteCategory($id){
       $category = Category::where('id',$id)->first();
       $category->delete($id);
       
       return redirect()->back()->with('category', 'Category deleted.!');
    }

}
