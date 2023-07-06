<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class UserController extends Controller
{
    public function home() {
        return view('admin.home.read');
    }

    public function login() {
        return view('admin.login.form_login');
    }
    public function loginPost(UserRequest $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $admin = User::where("email", "=", "$email")->first();
        if(Auth::attempt(['email'=>$email, 'password'=>$password])){
            $name = $admin->value('name');
            Session::put("name", $name);
            return redirect(url('backend'));
        } else {
            return redirect(url("backend/login?notify=invalid"));
        }
    }
    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect(url('backend/login'));
    }
    // lấy ra list danh sách sản phâm
    function read() {
        $records = User::orderBy("id", "desc")->paginate(10);
        return view("admin.users.read", compact('records'));
    }
    function edit($id) {
        $action = "backend/users/edit-post/".$id;
        $record = User::where("id", "=", $id)->first();
        return view("admin.users.create_update", compact(["action", "record"]));
    }
    function editPost(Request $request, $id) {
        $email = request('email');
        $name = request('name');
        $password = request('password');
        User::where("id", '=', $id)->update(['name'=>$name, "email"=>$email]);
        if($password != "") {
            $password = Hash::make($password);
            User::where("id", '=', $id)->update(["password"=>$password]);
        }
        return redirect((url("backend/users")))->with(["msg"=>'Cập nhật thành công']);
    }
    function create() {
        $action = "backend/users/create-post";
        return view("admin.users.create_update", compact('action'));
    }
    function createPost() {
        $email = request("email");
        $name = request("name");
        $password = request("password");
        $password = Hash::make($password);
        User::insert(['name'=>$name, "email"=>$email, "password"=>$password]);
        return redirect(url("backend/users"))->with(['msg'=>"Thêm thành công"]);
    }
    function delete($id) {
        User::where("id", "=", $id)->delete();
        return redirect(url("backend/users"));
    }
}