<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\ProductsModel;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    protected $model;
    function __construct() {
        $this->model = new ProductsModel();
    }
    function read() {
        $data = $this->model->readModel();
        $order = request()->get("order");
        switch ($order) {
            case 'nameAsc': 
                $data = DB::table('products')->orderBy("name", "asc")->paginate(16);
                break;
            case 'nameDesc': 
                $data = DB::table('products')->orderBy("name", "desc")->paginate(16);
                break;
            case 'priceAsc': 
                $data = DB::table('products')->orderBy("price", "asc")->paginate(16);
                break;
            case 'priceDesc': 
                $data = DB::table('products')->orderBy("price", "desc")->paginate(16);
                break;
            
        }
        return view("frontend.pages.products", compact('data', "order"));
    }
    function productsDetail($id) {
        $record = DB::table('products')->where("id", "=", $id)->first();
        return view("frontend.pages.products_detail", compact("record"));
    }
}