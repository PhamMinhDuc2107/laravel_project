<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\ShoppingCart\Cart;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\City;
use App\Models\District;
use App\Models\Commune;
use App\Models\Coupons;
use Carbon\Carbon;
use App\Models\FeeShip;
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
    //checkout
    public function checkOut() {
        $city = City::all();
        return view('frontend.pages.cart.order', compact(
            ['city']
        ));
    }
    public function total(Request $request) {
        $priceTotal = Cart::cartTotal();
        $coupon = $this->ajaxCheckCoupon($request);
        $feeShip = $this->ajaxFeeShip($request);
        dd($feeShip);
    
    }
    function ajaxDistrict(Request $request) {
        $data = [];
    
        if ($request->has('cityId')) {
            $cityId = $request->input('cityId');
            $districts = District::where('matp', $cityId)->get();
            
            foreach ($districts as $district) {
                $data[] = [
                    'id' => $district->maqh,
                    'name' => $district->name_quanhuyen,
                ];
            }
        } elseif ($request->has('districtId')) {
            $districtId = $request->input('districtId');
            $communes = Commune::where('maqh', $districtId)->get();
            foreach ($communes as $commune) {
                $data[] = [
                    'id' => $commune->xaid,
                    'name' => $commune->name_xaphuong,
                ];
            }
        }
        return response()->json($data);
    }   
    //check Coupons
    function ajaxCheckCoupon(Request $request) {
        $code = $request->input('code');
        $coupons = Coupons::where("code", "=",$code)->first();
        $data =[];
        if ($coupons) {
            $discountName = $coupons->code;
            $discount = 0; 
            if ($coupons->discount_amount > 100) {
                $discount = $coupons->discount_amount;
            } elseif ($coupons->discount_percentage <= 100) {
                $discount = $coupons->discount_percentage;
            }
            $data = [
                'discount' => $discount,
                'discountName' => $discountName,
                'quantity' => $coupons->quantity,
                'timeEnd' => $coupons->time_end,
            ];
            return response()->json($data);
        }
    }
    function ajaxFeeShip(Request $request) {
        $city = $request->input('city');
        $districts = $request->input('districts');
        $commune = $request->input('commune');
        $data = [];
        $record = FeeShip::where([
            ["xaid", "=", $commune]
        ])->first();
        if($record) {
            $data = ['feeship'=>$record->feeship];
        }
        return response()->json($data);
    }
}