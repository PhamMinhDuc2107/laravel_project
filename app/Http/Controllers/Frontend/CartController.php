<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\ShoppingCart\Cart;

class CartController extends Controller
{
    public function buy(Request $request,$id){
        Cart::cartAdd($id);
        return redirect(url("/cart"));
    }
    public function read(){
        $cart = Cart::cartList();
        return view("frontend.pages.cart.read",["cart"=>$cart]);
    }
    public function remove($id){
        Cart::cartDelete($id);
        return redirect(url("cart"));
    }
    public function destroy(){
        Cart::cartDestroy();
        return redirect(url("cart"));
    }
    public function update(){
        $cart = Cart::cartList();
        foreach($cart as $product){
            $name = "product_".$product['id'];
            $new_quantity = $_POST[$name];
            Cart::cartUpdate($product['id'],$new_quantity);
        }
        return redirect(url("cart"));
    }
    public function order(){
        $customer_id = session()->get("customer_id");
        if($customer_id != null){
            Cart::cartOrder();
            return redirect(url("cart"));
        }else
            return redirect(url('customers/login'));
        
    }
}