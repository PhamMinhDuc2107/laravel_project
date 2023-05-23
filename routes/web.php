<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use  Illuminate\Support\Facades\Auth;

//-------------------Admin-------------------
Route::get('backend/login', function () {
    return view('admin.login.form_login');

})->name("login-form");
Route::post("backend/login-post", function() {
    $email = request('email');
    $password = request('password');
    if(Auth::attempt(['email'=>$email, 'password'=>$password])){
       return redirect(url('backend'));
    } else {
        return redirect(url("backend/login?notify=invalid"));
    }
});
Route::get("backend/logout", function() {
    Auth::logout();
    return redirect(url('backend/login'));
});
Route::get('backend', function () {
    return view('admin.home.read');
})->middleware("check.login");
//-------------------/Admin-------------------
//-------------------Frontend-------------------
//-------------------/Frontend-------------------