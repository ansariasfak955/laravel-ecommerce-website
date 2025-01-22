<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    public function home(){
        $products = Product::get();
        $new_products = Product::limit(6)->latest()->get();
        $categories = Category::whereNull('category_id')->get();
        $category_id = Category::get();
        // $userId = Auth::user()->id;
        // $totalCart = Cart::where('user_id', $userId)->count();
        // echo "<pre>"; print_r($category_id);die;
        return view('front.index', compact('products','new_products','categories','category_id'));
    }
    public function specialOffer(){
        return view('front.specialOffer');
    }
    public function delivery(){
        return view('front.delivery');
    }
    public function contact(){
        return view('front.contact');
    }
    public function cart(){
        $carts = [];
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        return view('front.cart', compact('carts'));
    }
    public function productView(Request $request){
        $id = $request->id;
        $product = Product::where('id', $id)->with('ProductDetail')->first();
        $category_id = $product->category_id;
        $releted_products = Product::where('category_id', $category_id)->get();
        return view('front.productView', compact('product','releted_products'));
    }

    public function user_login(Request $request){
        return view('front.login');
    }
    public function user_store(Request $request){
        $data = array(
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        );

        $user = User::create($data);
        return redirect()->route('user_login');
    }
    public function loginCheck(Request $request){
        $data = array(
            'email' => $request->email,
            'password' =>$request->password
        );
        $user = User::where('email', $request->email)->where('role','user')->first();
        // dd($user);
        if(Auth::attempt($data)){
            Session::put('status', true);
            Session::put('id', $user->id);
            Session::put('first_name', $user->name);
            Session::put('email', $user->email);
            return redirect()->route('home');
        }else{
            return back()->withErrors(['message'=>'Invalid email or password']);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        session()->forget('id');
        session()->forget('first_name');
        session()->forget('email');
        return redirect()->route('user_login');
    }
    public function products(Request $request, $id){
        $products = Product::where('category_id', $id)->get();
        $categories = Category::whereNull('category_id')->get();
        $category_id = Category::get();
        return view('front.products', compact('categories','category_id','products'));
    }
}
