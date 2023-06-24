<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
        $user = DB::table('users')->where("email", "=", "$email")->get();
        $name = $user->value('name');
        if(Auth::attempt(['email'=>$email, 'password'=>$password])){
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
        $records = DB::table('users')->orderBy("id", "desc")->paginate(10);
        return view("admin.users.read", compact('records'));
    }
    function edit($id) {
        $action = "backend/users/edit-post/".$id;
        $record = DB::table('users')->where("id", "=", $id)->first();
        return view("admin.users.create_update", compact(["action", "record"]));
    }
    function editPost(Request $request, $id) {
        $email = request('email');
        $name = request('name');
        $password = request('password');
        DB::table('users')->where("id", '=', $id)->update(['name'=>$name, "email"=>$email]);
        if($password != "") {
            $password = Hash::make($password);
            DB::table('users')->where("id", '=', $id)->update(["password"=>$password]);
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
        DB::table("users")->insert(['name'=>$name, "email"=>$email, "password"=>$password]);
        return redirect(url("backend/users"))->with(['msg'=>"Thêm thành công"]);
    }
    function delete($id) {
        DB::table('users')->where("id", "=", $id)->delete();
        return redirect(url("backend/users"));
    }
}