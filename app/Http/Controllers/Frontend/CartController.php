<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
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
use App\Models\Shipping;
use Illuminate\Support\Facades\Mail;
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
        $cartNumber = Cart::cartNumber();
        return response()->json(['total' => $total, 'quantity'=>$quantity, 'cartNumber'=>$cartNumber]);
    }
    //checkout
    public function checkOut() {
        $city = City::all();
        return view('frontend.pages.cart.order', compact(
            ['city']
        ));
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
        $coupons = Coupons::where("code", $code)->first();
        $now = Carbon::now();
        $data =[];
        if ($coupons) {
            $endTime = Carbon::create("$coupons->time_end");
            if($coupons->quantity > 0) {
                if($now->lessThan($endTime)) {
                    $data = [
                        "code" => $coupons->code,
                        "discount"=>$coupons->discount_amount,
                    ];
                    Session::put('coupons', $coupons->id);
                }
            }
        }
        return response()->json($data);
    }
    function ajaxFeeShip(Request $request) {
        $commune = $request->input('commune');
        $data = [];
        $record = FeeShip::where([
            ["xaid", "=", $commune]
        ])->first();
        if($record) {
            $feeship = $record->feeship;
            Session::put('feeship', $feeship);
            $data = ['feeship'=>$feeship];
        }
        return response()->json($data);
    }
    public function ajaxCheckPay(Request $request) {
        $city = $request->input('city');
        $districts = $request->input('district');
        $commune = $request->input('commune');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address').",".$commune.",".$districts.",".$city;
        $note = $request->input('note');
        $feeship = 30000;
        $coupon_discount = 0;
        if(session()->get('feeship')) {
            $feeship = session()->get('feeship');
        }
        $payment = $request->input('paymentMethod');
        $coupon_id = Session::get("coupons");
        $customer_id = Session::get("customer_id");
        $total = Cart::cartTotal() + $feeship;
        $data = [
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            "address"=>$address,
            'notes'=>$note,
            "method"=>0
        ];
        $cart = Session::get('cart');
        switch($payment) {
            case "cash": {
                $shipping = Shipping::create($data);
                $shipping_id = $shipping->id;
                if($coupon_id) {
                    $coupon = Coupons::find($coupon_id);
                    $quantity = $coupon->quantity - 1;
                    $coupon_discount = $coupon->discount_amount;
                    $coupon->update(["quantity"=>$quantity]);
                    $total = $total - $coupon_discount;
                    Session::forget('coupons');
                }
                $order = Order::create([
                    "customer_id" => $customer_id,
                    "shipping_id" => $shipping_id,
                    "quantity"=> Cart::cartNumber(),
                    "total"=>$total,
                    "date"=>now(),
                    'order_status'=>0,
                    "coupon_id" => $coupon_id,
                    "feeship"=>$feeship,
                ]);
                $order_id = $order->id;
                foreach($cart as $item) {
                    $order_detail = OrderDetail::create([
                        'order_id'=>$order_id,
                        'product_id' => $item['id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }
                $this->testEmail($email,$data, $total, $feeship,$coupon_discount,$cart );
                Session::forget('feeship');
                Session::forget('cart');
                Alert::toast('Đặt hàng thành công', 'success')->position('top-end')->autoClose(2000);
                return redirect(url("cart"));
            }
        }
    }
    public function testEmail($e,$data, $total, $feeship,$coupon_discount,$cart  )  {
        Mail::send("frontend.pages.emails.test",compact(['data', 'total','feeship', 'coupon_discount','cart']), function($email) use($e) {
            $email->subject("Đơn đặt hàng");
            $email->to("$e"); 
        });
    }
}