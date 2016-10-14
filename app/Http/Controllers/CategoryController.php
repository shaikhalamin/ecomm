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
    $categories =Category::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.categorymanage',['categories'=>$categories]);
    }

  public function getEditCategory($id){
    $category = Category::where('id',$id)->get()->first();
    //dd($category);
    return view('admin.edit-category',['category'=>$category]);
  }

  public function postEditCategory($id){

    //$category = Category::where('id',$id)->get()->first();
    //dd($id);
    //return view('admin.edit-category',['category'=>$category]);
    return redirect()->back()->with('category', 'You are not allowed to edit Category!!!');
  }


  public function postDeleteCategory($id){
       //$category = Category::where('id',$id)->first();
       //$category->delete($id);
       
       return redirect()->back()->with('category', 'You are not allowed to delete Category!!!');
  }



}
