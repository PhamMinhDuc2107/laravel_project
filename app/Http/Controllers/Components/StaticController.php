<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{
    public static function getBrandName($brand_id){
		$record = DB::table("categories")->where("id","=",$brand_id)->first();
		return isset($record->name) ? $record->name : "";
	}
	public static function getCategoryName($category_id) {
		$record = DB::table("categories")->where("id","=",$category_id)->first();
		return isset($record->name) ? $record->name : "";
	}
    static function getCategory($id) {
        $data = DB::table("categories")->where("id", "=", $id)->first();
        return $data;
    }
    static function getCategories() {
        $data = DB::table("categories")->where("parent_id", "=", "0")->get();
        return $data;
    }
    static function getBrand($id) {
        $data = DB::table("categories")->where("parent_id", "!=", 0)->orWhere("id", "=", $id)->get();
        return $data;
    }
    static function getBrands() {
        $data = DB::table("categories")->where("parent_id", "!=", 0)->get();
        return $data;
    }
    //products
    static function products($id) {
        $data = DB::table("products")->where("category_id", "=", $id)->take(4)->get();
        return $data;
    }
    static function productsHot($id) {
        $productsHot = DB::table("products")->where("category_id", "=", $id)->orWhere('hot', "=", '1')->take(4)->get();
        return $productsHot;
    }
}