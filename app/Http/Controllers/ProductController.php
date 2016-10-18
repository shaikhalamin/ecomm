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

class ProductController extends Controller
{
    public function getIndex(){
        $products =Product::orderBy('created_at', 'desc')->paginate(6);
        $categories = Category::all();
    	 return view('shop.index', ['products' => $products,'categories' => $categories ]);
    }

    public function getProductByCategory($id){
        $categories = Category::all();
        $products = Product::where('category_id',$id)->orderBy('created_at', 'desc')->paginate(6);
        return view('shop.category-product',['products'=>$products,'categories'=>$categories]);
    }

    public function getAddToCart(Request $request,$id){
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart',$cart);
    	//dd($request->session()->get('cart'));

    	return redirect()->route('product.index')->with('info', 'Product added to cart.!');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }  

        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }        
        return redirect()->route('product.shoppingCart');

    }

    public function getCart(){
    	if(!Session::has('cart')){
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_WGhYux4yl6lmLLsCqUY88N9O');
        try{
            $charge = Charge::create(array(
              "amount" => $cart->totalPrice * 100,
              "currency" => "usd",
              "source" => $request->input('stripeToken'), // obtained with Stripe.js
              "description" => "Test Charges have been conformed"
            ));
            $orders = new Orders;
            // here serialize convert php object into string
            $orders->cart = serialize($cart);
            $orders->name = $request->input('name');
            $orders->address = $request->input('address');
            $orders->payment_id = $charge->id;

            Auth::user()->orders()->save($orders);

        } catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased product');
    }


    public function getProductSearch(Request $request){
     $query = $request->input('query');

      if(!$query){
       return redirect()->route('product.index')->with('feedback','please enter name to search!');
      }

      
      $products = Product::where('title', 'LIKE', "%{$query}%")
      ->orWhere('description', 'LIKE', "%{$query}%")
      ->get();
      $categories = Category::all();
      //dd($products);
     
       return view('shop.search-result', ['products' => $products,'categories' => $categories ]);

    } 


}
