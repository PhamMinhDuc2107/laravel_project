<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
class CustomersController extends Controller
{
    // lấy ra list danh sách sản phâm
    function read() {
        $records = Customers::orderBy("id", "desc")->paginate(10);
        return view("admin.customers.read", compact('records'));
    }
    function edit($id) {
        $action = "backend/customers/edit-post/".$id;
        $record = Customers::where("id", "=", $id)->first();
        return view("admin.customers.create_update", compact(["action", "record"]));
    }
    function editPost(Request $request, $id) {
        $email = request('email');
        $name = request('name');
        $password = request('password');
        $address = request('address');
        Customers::where("id", '=', $id)->update(['name'=>$name, "email"=>$email,  "address"=>$address]);
        if($password != "") {
            $password = Hash::make($password);
            Customers::where("id", '=', $id)->update(["password"=>$password]);
        }
        return redirect((url("backend/customers")))->with(["msg"=>'Cập nhật thành công']);
    }
    function create() {
        $action = "backend/customers/create-post";
        return view("admin.customers.create_update", compact('action'));
    }
    function createPost() {
        $email = request("email");
        $name = request("name");
        $password = request("password");
        $address = request("address");
        $phone = request("phone");
        $password = Hash::make($password);
        Customers::insert(['name'=>$name, "email"=>$email, "password"=>$password, "address"=>$address,'phone'=>$phone]);
        return redirect(url("backend/customers"))->with(['msg'=>"Thêm thành công"]);
    }
    function delete($id) {
        Customers::where("id", "=", $id)->delete();
        return redirect(url("backend/customers"));
    }
}