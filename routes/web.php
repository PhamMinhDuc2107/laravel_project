<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use  Illuminate\Support\Facades\Auth;

//-------------------Admin-------------------
Route::get('backend/login',[UserController::class, "login"]);
Route::prefix("backend")->group(function( ) {
    Route::post("login-post",[UserController::class, "loginPost"]);
    Route::get("logout",[UserController::class, "logout"]);
    Route::get('/',[UserController::class, "home"])->middleware("check.login");
    // users
    Route::get("users", [UserController::class, "read"]);
    Route::get("users/create", [UserController::class, "create"]);
    Route::post("users/create-post", [UserController::class, "createPost"]);
    Route::get("users/edit/{id}", [UserController::class, "edit"]);
    Route::post("users/edit-post/{id}", [UserController::class, "editPost"]);
    Route::get("users/delete/{id}", [UserController::class, "delete"]);
    //categories
    Route::get("/categories", [CategoriesController::class, "read"]);
    Route::get("/categories/create", [CategoriesController::class, "create"]);
    Route::post("/categories/create-post", [CategoriesController::class, "createPost"]);
    Route::get("/categories/edit/{id}", [CategoriesController::class, "edit"]);
    Route::post("/categories/edit-post/{id}", [CategoriesController::class, "editPost"]);
    Route::get("/categories/delete/{id}", [CategoriesController::class, "delete"]);

})->middleware("check.login");
//-------------------/Admin-------------------
//-------------------Frontend-------------------
//-------------------/Frontend-------------------