<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\HomeModel;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index() {
        $categories = $this->getCategoryDisplay();
        $mobile = DB::table("products")->where("category_id", '=', '50')->take(10)->get();
        $tablet = DB::table("products")->where("category_id", '=', '53')->take(10)->get();
        $laptop = DB::table("products")->where("category_id", '=', '52')->take(10)->get();
        return view("frontend.pages.home.home", compact(['categories', 'mobile','tablet', 'laptop']));
    }
    static public function getProducts($id) {
        $data = DB::table("products")->where("category_id", '=',$id)->orderBy("id", "asc")->take(10)->get();
        return $data;
    }
     public function getCategoryDisplay() {
        $data = DB::table('categories')->where("display_at_home_page", "!=", "0")->get();
        return $data;
    }
   
}