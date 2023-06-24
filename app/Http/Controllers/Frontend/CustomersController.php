<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class CustomersController extends Controller
{
    public function login(){
        return view("frontend.pages.customer.form_customer_login");
    }
    public function loginPost(){
        $email = request()->get("email");
        $password = request()->get("password");
        $record = DB::table("customers")->where("email","=",$email)->first();
        if(isset($record->email)){
            if(Hash::check($password,$record->password)){
                session()->put("customer_email",$record->email);
                session()->put("customer_id",$record->id);
                session()->put("customer_name",$record->name);
                return redirect(url(''));
            }
        }else {
        return redirect(url('customers/login?notify=invalid'));
        }
    }
    public function register(){
        return view("frontend.pages.customer.form_customer_register");
    }
    public function registerPost(){
        $email = request()->get("email");
        $password = request()->get("password");
        $password = Hash::make($password);
        $name = request()->get("name");
        $phone = request()->get("phone");
        $address = request()->get("address");
        //kiểm tra xem email đã tồn tại chưa, nếu chưa thì mới cho insert
        $check = DB::table("customers")->where("email","=",$email)->first();
        if(!isset($check->email))
            DB::table("customers")->insert(["email"=>$email,"name"=>$name,'password'=>$password,'phone'=>$phone,'address'=>$address]);
        else
            return redirect(url('customers/register?notify=invalid'));
        return redirect(url('customers/login'));
    }
    public function logout(){
        session()->flush();
        return redirect(url(''));
    }
}