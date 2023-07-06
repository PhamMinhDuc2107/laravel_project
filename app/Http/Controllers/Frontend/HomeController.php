<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\HomeModel;
use Illuminate\Support\Facades\DB;
use App\Models\Sliders;

class HomeController extends Controller
{
    function index() {
        $categories = $this->getCategoryDisplay();
        $sliders = Sliders::where("active", "=", "1")->get();
        $cate = [];
        $cateName = [];
        foreach($categories as  $item) {
            array_push($cate, $item->id);
            array_push($cateName, $item->name);
        }
        $products =[];
        foreach ($cate as $item) {
            $product = DB::table("products")->where("category_id", '=', $item)->where("hot", '=', '1')->take(10)->get();
            array_push($products, $product);
        }
        return view("frontend.pages.home.home", compact(['categories','products', 'sliders','cateName']));
    }
    static public function getProducts($id) {
        $data = DB::table("products")->where("category_id", '=',$id)->orderBy("id", "asc")->take(10)->get();
        return $data;
    }
     public function getCategoryDisplay() {
        $data = DB::table('categories')->where("display_at_home_page", "!=", "0")->get();
        return $data;
    }
    public function filter(Request $request)
    {
        
        $priceFilters = $request->input('price_filters', []);

        $products = DB::table('products');

        foreach ($priceFilters as $priceFilter) {
            $priceRange = explode('-', $priceFilter);
            if (count($priceRange) == 2) {
                $minPrice = $priceRange[0];
                $maxPrice = $priceRange[1];
                $products->orWhereBetween('price', [$minPrice, $maxPrice]);
            }
        }
        $filteredProducts = $products->get();
        dd($filteredProducts);
        return view('filtered_data', compact('filteredProducts'));
    }
}