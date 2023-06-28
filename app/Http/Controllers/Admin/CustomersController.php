<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class CustomersController extends Controller
{
    // lấy ra list danh sách sản phâm
    function read() {
        $records = DB::table('customers')->orderBy("id", "desc")->paginate(10);
        return view("admin.customers.read", compact('records'));
    }
    function edit($id) {
        $action = "backend/customers/edit-post/".$id;
        $record = DB::table('customers')->where("id", "=", $id)->first();
        return view("admin.customers.create_update", compact(["action", "record"]));
    }
    function editPost(Request $request, $id) {
        $email = request('email');
        $name = request('name');
        $password = request('password');
        $address = request('address');
        DB::table('customers')->where("id", '=', $id)->update(['name'=>$name, "email"=>$email,  "address"=>$address]);
        if($password != "") {
            $password = Hash::make($password);
            DB::table('customers')->where("id", '=', $id)->update(["password"=>$password]);
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
        $password = Hash::make($password);
        DB::table("customers")->insert(['name'=>$name, "email"=>$email, "password"=>$password, "address"=>$address]);
        return redirect(url("backend/customers"))->with(['msg'=>"Thêm thành công"]);
    }
    function delete($id) {
        DB::table('customers')->where("id", "=", $id)->delete();
        return redirect(url("backend/customers"));
    }
}