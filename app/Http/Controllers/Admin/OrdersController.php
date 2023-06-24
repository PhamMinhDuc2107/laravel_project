<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrdersController extends Controller
{
    public function read(){
        $data = DB::table("orders")->orderBy("id","desc")->paginate(50);
        return view("admin.orders.read",["data"=>$data]);
    }
    public function detail($id){
        $order = DB::table("orders")->where("id","=",$id)->first();
        $customer = $this->getCustomer($order->customer_id);
        $order_detail = DB::table("order_details")->where("id", '=', $order->id)->first();
        $products = $this->getProducts($order->id);
        return view("admin.orders.orders_detail",["order_id"=>$id, 'order'=>$order, 'customer'=>$customer, 'products'=>$products]);
    }
    public function update($id){
        $data = DB::table("orders")->where("id","=",$id)->first();
        if($data->status === 0) {
            DB::table("orders")->where("id","=",$id)->update(['status'=> 1]);
        } else {
            DB::table("orders")->where("id","=",$id)->update(['status'=> 2]);
        }
        return redirect(url('backend/orders/detail/'.$id));
    }
    function getOrder($order_id){
        $order = DB::table("orders")->where("id","=",$order_id)->first();
        return $order;
    }
    function getCustomer($customer_id){
        $customer = DB::table("customers")->where("id","=",$customer_id)->first();
        return $customer;
    }
    function getProducts($order_id){
        $products = DB::table("order_details")->join("products","order_details.product_id","=","products.id")->select("products.name","products.photo","products.discount","order_details.quantity","order_details.price")->where('order_id', "=", $order_id)->first();
        return $products;
    }
    static function getCustomerName($customer_id){
        $record = DB::table("customers")->where("id","=",$customer_id)->first();
        return isset($record->name) ? $record->name : "";
    }
    
}