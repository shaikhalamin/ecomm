<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;



class AuthController extends Controller
{
  
  public function getSignup()
  {
    
    return view('user.signup');

  }
  
  public function postSignup(Request $request)
  {
 
   $this->validate($request,[
      'email'=>'required|unique:users|email|max:255',
      'username'=>'required|unique:users|alpha_dash|max:20',
      'password'=>'required|min:6',
      'first_name'=>'required|unique:users|alpha_dash|max:20',
      'last_name'=>'required|unique:users|alpha_dash|max:20',
      'location'=>'required|max:50',

   	]);

   User::create([
     'email'=> $request->input('email'),
     'username'=> $request->input('username'),
     'password'=> bcrypt($request->input('password')),
     'first_name'=> $request->input('first_name'),
     'last_name'=> $request->input('last_name'),
     'location'=> $request->input('location'),

   	]);

   return redirect()->route('home')->with('info', 'Your acccount has been created and you can sign in now.!');

  }

  public function getSignin()
  {
    return view('admin.signin');
  }

	  public function postSignin(Request $request)
	  {
	    $this->validate($request,[
	      'email'=>'required|email|max:255',
	      'password'=>'required|min:6',
	   	]);

	   	if(!Auth::attempt($request->only(['email','password']), $request->has('remember')))
	   	{
	       return redirect()->back()->with('info','Could not signed you with those credentials.!');
	   	}

	    return redirect()->route('home')->with('info','You are now signed in.!');
	  }

	  public function getSignout(){

        Auth::logout();

        return redirect()->route('home')->with('info','You are signed out!');
    }

}