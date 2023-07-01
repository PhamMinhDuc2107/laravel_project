<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Frontend\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use  Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Frontend\IntroduceController;
use App\Http\Controllers\Admin\CustomersController  as AdminCustomers;
use App\Http\Controllers\Frontend\SocialController;
use Laravel\Socialite\Facades\Socialite;
//-------------------Admin-------------------
Route::prefix("backend")->group(function( ) {
    //login
    Route::prefix('/')->group(function() {
        Route::get('login',[UserController::class, "login"]);
        Route::post("login-post",[UserController::class, "loginPost"]);
        Route::get("logout",[UserController::class, "logout"]);
        Route::get('',[UserController::class, "home"])->middleware("check.login");
    })->middleware("check.login");
    // users
    Route::prefix('/customers')->group(function() {
        Route::get("/", [AdminCustomers::class, "read"])->middleware("check.login");
        Route::get("/create", [AdminCustomers::class, "create"])->middleware("check.login");
        Route::post("/create-post", [AdminCustomers::class, "createPost"]);
        Route::get("/edit/{id}", [AdminCustomers::class, "edit"])->middleware("check.login");
        Route::post("/edit-post/{id}", [AdminCustomers::class, "editPost"]);
        Route::get("/delete/{id}", [AdminCustomers::class, "delete"])->middleware("check.login");
    })->middleware("check.login");
    //Coupons
    Route::prefix("/coupons")->group(function() {
        Route::get("/", [CouponsController::class, "read"])->middleware("check.login");
        Route::get("/create", [CouponsController::class, "create"])->middleware("check.login");
        Route::post("/create-post", [CouponsController::class, "createPost"]);
        Route::get("/edit/{id}", [CouponsController::class, "edit"])->middleware("check.login");
        Route::post("/edit-post/{id}", [CouponsController::class, "editPost"]);
        Route::get("/delete/{id}", [CouponsController::class, "delete"])->middleware("check.login");
    });
    Route::prefix('/users')->group(function() {
        Route::get("/", [UserController::class, "read"])->middleware("check.login");
        Route::get("/create", [UserController::class, "create"])->middleware("check.login");
        Route::post("/create-post", [UserController::class, "createPost"]);
        Route::get("/edit/{id}", [UserController::class, "edit"])->middleware("check.login");
        Route::post("/edit-post/{id}", [UserController::class, "editPost"]);
        Route::get("/delete/{id}", [UserController::class, "delete"])->middleware("check.login");
    })->middleware("check.login");
    
    //categories
    Route::prefix("/categories")->group(function() {
        Route::get("/", [CategoriesController::class, "read"])->middleware("check.login");
        Route::get("/create", [CategoriesController::class, "create"])->middleware("check.login");
        Route::post("/create-post", [CategoriesController::class, "createPost"]);
        Route::get("/edit/{id}", [CategoriesController::class, "edit"])->middleware("check.login");
        Route::post("/edit-post/{id}", [CategoriesController::class, "editPost"]);
        Route::get("/delete/{id}", [CategoriesController::class, "delete"])->middleware("check.login");
    })->middleware("check.login");
    
    //Products
    Route::prefix('/products')->group(function() {
        Route::get('/',[ProductsController::class,'read'])->middleware("check.login");
        Route::get('/create',[ProductsController::class,'create'])->middleware("check.login");
        Route::post('/create-post',[ProductsController::class,'createPost']);
        Route::get('/update/{id}',[ProductsController::class,'update'])->middleware("check.login");
        Route::post('/update-post/{id}',[ProductsController::class,'updatePost']);
        Route::get('/delete/{id}',[ProductsController::class,'delete'])->middleware("check.login");
    })->middleware("check.login");
    //News
    Route::prefix("/news")->group(function() {
        Route::get('/',[NewsController::class,'read'])->middleware("check.login");
        Route::get('/create',[NewsController::class,'create'])->middleware("check.login");
        Route::post('/create-post',[NewsController::class,'createPost']);
        Route::get('/update/{id}',[NewsController::class,'update'])->middleware("check.login");
        Route::post('/update-post/{id}',[NewsController::class,'updatePost']);
        Route::get('/delete/{id}',[NewsController::class,'delete'])->middleware("check.login");
    })->middleware("check.login");
    
    
    // orders 
    Route::prefix('/orders')->group(function() {
        Route::get('/',[OrdersController::class, 'read'] )->middleware("check.login");
        Route::get("/detail/{id}",[OrdersController::class, 'detail'] )->middleware("check.login");
        Route::get('/update/{id}',[OrdersController::class, 'update'] )->middleware("check.login");
    })->middleware("check.login");

})->middleware("check.login");
//-------------------/Admin-------------------
//-------------------Frontend-------------------
use App\Http\Controllers\Frontend\ProductsController as  frontendProducts;
use App\Http\Controllers\Frontend\CustomersController;
use App\Http\Controllers\Frontend\BlogController as frontendBlog;
use \App\Http\Controllers\Frontend\CartController;
Route::prefix("/")->group(function() {
    Route::get('introduce',[IntroduceController::class, 'read']);
    Route::get("",[HomeController::class, "index"]);
    // Products
    Route::prefix("products")->group(function() {
        Route::get("/",[frontendProducts::class, "read"]);
        Route::get("/news",[frontendProducts::class, "news"]);
        Route::get("/hot",[frontendProducts::class, "hot"]);
        Route::get("/sale",[frontendProducts::class, "sale"]);
        Route::get("/{id}",[frontendProducts::class, "products"]);
        Route::get('/detail/{id}', [frontendProducts::class, "productsDetail"]);
    });
    Route::post('/comment-post/{id}', [frontendProducts::class, "comment"]);
    Route::get('/search',[frontendProducts::class,'search']);
    Route::get('/ajax-search',[frontendProducts::class,'ajax']);
    Route::get('/rating/{id}',[frontendProducts::class,'rating']);
    Route::get('/contact',function() {
        $name = "Liên hệ";
        return view('frontend.pages.contact.read',compact('name'));
    });
    // customers
    Route::prefix('customers')->group(function() {
        Route::get('/login',[CustomersController::class,'login']);
        Route::post('/login-post',[CustomersController::class,'loginPost']);
        Route::get('/register',[CustomersController::class,'register']);
        Route::post('/register-post',[CustomersController::class,'registerPost']);
        Route::get('/logout',[CustomersController::class,'logout']);
    });
    //Blog 
    Route::prefix('blog')->group(function() {
        Route::get('', [frontendBlog::class, "blog"]);
        Route::get('/detail/{id}', [frontendBlog::class, "blogDetail"]);
    });
    Route::prefix('introduce')->group(function() {
        Route::get('', [frontendBlog::class, "blog"]);
        Route::get('/detail/{id}', [frontendBlog::class, "blogDetail"]);
    });
    // Cart
    Route::prefix("cart")->group(function() {
        Route::get("",[CartController::class, 'read']);
        Route::get("/buy/{id}",[CartController::class, 'buy']);
        Route::get("/remove/{id}",[CartController::class, 'remove']);
        Route::get("/order",[CartController::class, 'order']);
        Route::post('/update-cart', [CartController::class, 'updateCart']);
        Route::get('/checkout', [CartController::class, 'checkOut']);
        Route::get('/checkout/ajax-district', [CartController::class, 'ajaxDistrict']);
        Route::post('/check-coupon', [CartController::class, 'ajaxCheckCoupon']);
        Route::post('/feeShip', [CartController::class, 'ajaxFeeShip']);
    });
    //Login social FaceBook
    Route::get('/login/{social}', [SocialController::class,'redirectToSocial']);
    Route::get('/login/callback/{social}', [SocialController::class,'handleSocialCallback']);
});
//-------------------/Frontend-------------------