<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\ShoppingCart\Cart;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
class CartController extends Controller
{
    public function buy(Request $request,$id){
        Cart::cartAdd($id);
        Alert::toast('Thêm sản phẩm thành công', 'success')->position('top-end')->autoClose(2000);
        return redirect()->back();
    }
    public function buyWithNumber($id, $quantity){
        Cart::cartAddWithNumber($id, $quantity); 
        
        return redirect(url("/cart"));
    }
    public function read(){
        $cart = Cart::cartList();
        $name = "Giỏ hàng";
        return view("frontend.pages.cart.read",["cart"=>$cart, "name"=>$name]);
    }
    public function remove($id){
        Cart::cartDelete($id);
        Alert::toast('Đã xóa khỏi giỏ hàng', 'success')->position('top-end')->autoClose(2000);
        return redirect(url("cart"));
    }
    public function order(){
        $customer_id = session()->get("customer_id");
        if($customer_id != null){
            Cart::cartOrder();
            Alert::success('Thanh toán thành công', 'Success')->autoClose(3000);
            return redirect(url("cart"));
        }else
            return redirect(url('customers/login'));
        
    }
    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $cart = Session::get('cart');
        if ($cart && isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            Session::put('cart', $cart);
        }
        $total = Cart::cartTotal();
        return response()->json(['total' => $total, 'quantity'=>$quantity]);
    }
}