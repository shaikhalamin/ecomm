<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Http\Requests;
use Image;
use Session;

class UserController extends Controller
{
    public function getSignup(){
    	return view('user.signup');
    }
    public function postSignup(Request $request){
    //dd($request->all());
    $this->validate($request,[
      'email'=>'required|unique:users|email|max:255',
      'username'=>'required|unique:users|alpha_dash|max:20',
      'password'=>'required|min:6',
      'first_name'=>'required|max:20',
      'last_name'=>'required|max:20',
      'location'=>'required|max:50',

    ]);

    User::create([
     'email'=> $request->input('email'),
     'username'=> $request->input('username'),
     'password'=> bcrypt($request->input('password')),
     'firstname'=> $request->input('first_name'),
     'lastname'=> $request->input('last_name'),
     'location'=> $request->input('location'),

     ]);
      if(Session::has('oldUrl')){
          $oldUrl = Session::get('oldUrl');
          Session::forget('oldUrl');
          return redirect()->to($oldUrl);
        }
      return redirect()->route('product.index')->with('info', 'Your acccount has been created and you can sign in now.!');
    }

    public function getSignin(){
        return view('user.signin');
    }

   public function postSignin(Request $request){
    $this->validate($request,[
          'email'=>'required|email|max:255',
          'password'=>'required|min:6',
        ]);

        if(!Auth::attempt($request->only(['email','password']), $request->has('remember')))
        {
           return redirect()->back()->with('info','Could not signed you with those credentials.!');
        }
        if(Session::has('oldUrl')){
          $oldUrl = Session::get('oldUrl');
          Session::forget('oldUrl');
          return redirect()->to($oldUrl);
        }
        return redirect()->route('user.profile')->with('profile','You are now signed in.!');
    }

    public function getProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
          $order->cart = unserialize($order->cart);
          return $order;
        });

        return view('user.profile',['user' => Auth::user(),'orders' => $orders]);

    }

    public function getUserOrders(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
          $order->cart = unserialize($order->cart);
          return $order;
        });

        return view('user.user-orders',['user' => Auth::user(),'orders' => $orders]);

    }

    public function postProfile(Request $request){
      if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename=uniqid() . $avatar->getClientOriginalName();
        //$avatar->move('uploads/avatars', $filename);
        Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename ) );
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
      }
      return view('user.profile',['user' => Auth::user()]);
    }

    public function getUpload(){
      return view('user.image-upload',['user' => Auth::user()]);
    }

    public function getSignout(){
      if(Session::has('cart')){
            Session::forget('cart');
        }
        Auth::logout();
        return redirect()->route('user.signin')->with('info','You are signed out!');
    }
}
