<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\HomeModel;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index() {
        $products = $this->getProducts();
        return view("frontend.pages.home.home", compact(['products']));
    }
    function getProducts() {
        $data = DB::table("products")->orderBy("id", "desc")->take(10)->get();
        return $data;
    }
}