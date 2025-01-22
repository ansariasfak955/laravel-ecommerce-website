<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Validator;
use Auth;

class CartController extends Controller
{
    // public function index(){
    //     $userId = Auth::user()->id;
    //     $totalCart = Cart::where('user_id', $userId)->count();
    //     // dd($totalCart);
    //     return compact('totalCart');
    // }
    public function store(Request $request){
        $this->validate($request, [
            'qty' => 'required',
        ]);

        $data = array(
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'user_id' => Auth::user()->id
        );
        Cart::create($data);
        return redirect()->route('cart');
    }

    public function destroy(Request $request){
        $id = $request->id;
        $cart = Cart::where('id', $id)->first();
        $cart->delete();
    }
}
