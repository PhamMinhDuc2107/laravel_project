<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class HomeModel extends Model
{
    use HasFactory;
    function getCategories($id) {
        $data = DB::table("categories")->where("id", "=", $id)->first();
        return $data;
    }
    function getProducts() {
        $data = DB::table("products")->orderBy("id", "desc")->get();
        return $data;
    }
}