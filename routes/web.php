<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use  Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Frontend\HomeController;

//-------------------Admin-------------------
Route::prefix("backend")->group(function( ) {
    Route::get('login',[UserController::class, "login"]);
    Route::post("login-post",[UserController::class, "loginPost"]);
    Route::get("logout",[UserController::class, "logout"]);
    Route::get('/',[UserController::class, "home"])->middleware("check.login");
    // users
    Route::get("users", [UserController::class, "read"])->middleware("check.login");
    Route::get("users/create", [UserController::class, "create"])->middleware("check.login");
    Route::post("users/create-post", [UserController::class, "createPost"]);
    Route::get("users/edit/{id}", [UserController::class, "edit"])->middleware("check.login");
    Route::post("users/edit-post/{id}", [UserController::class, "editPost"]);
    Route::get("users/delete/{id}", [UserController::class, "delete"])->middleware("check.login");
    //categories
    Route::get("/categories", [CategoriesController::class, "read"])->middleware("check.login");
    Route::get("/categories/create", [CategoriesController::class, "create"])->middleware("check.login");
    Route::post("/categories/create-post", [CategoriesController::class, "createPost"]);
    Route::get("/categories/edit/{id}", [CategoriesController::class, "edit"])->middleware("check.login");
    Route::post("/categories/edit-post/{id}", [CategoriesController::class, "editPost"]);
    Route::get("/categories/delete/{id}", [CategoriesController::class, "delete"])->middleware("check.login");
    //Products
    //read
    Route::get('/products',[ProductsController::class,'read'])->middleware("check.login");
    //create
    Route::get('/products/create',[ProductsController::class,'create'])->middleware("check.login");
    //create post
    Route::post('/products/create-post',[ProductsController::class,'createPost']);
    //update
    Route::get('/products/update/{id}',[ProductsController::class,'update'])->middleware("check.login");
    //update post
    Route::post('/products/update-post/{id}',[ProductsController::class,'updatePost']);
    //delete
    Route::get('/products/delete/{id}',[ProductsController::class,'delete'])->middleware("check.login");
    //News
    //read
    Route::get('/news',[NewsController::class,'read'])->middleware("check.login");
    //create
    Route::get('/news/create',[NewsController::class,'create'])->middleware("check.login");
    //create post
    Route::post('/news/create-post',[NewsController::class,'createPost']);
    //update
    Route::get('/news/update/{id}',[NewsController::class,'update'])->middleware("check.login");
    //update post
    Route::post('/news/update-post/{id}',[NewsController::class,'updatePost']);
    //delete
    Route::get('/news/delete/{id}',[NewsController::class,'delete'])->middleware("check.login");

})->middleware("check.login");
//-------------------/Admin-------------------
//-------------------Frontend-------------------
Route::get("/",[HomeController::class, "index"]);
//-------------------/Frontend-------------------