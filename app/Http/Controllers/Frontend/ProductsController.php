<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Components\StaticController;
use Illuminate\Support\Facades\Date;
class ProductsController extends Controller
{
    protected $model;
    function read() {
        $data = DB::table("products")->orderBy("id", "desc")->paginate(12);
        $count = DB::table('products')->count();
        $brand = DB::table('categories')->where('parent_id', "!=", "0")->get();
        $order = request()->get("order");
        switch ($order) {
            case 'nameAsc': 
                $data = DB::table("products")->orderBy("name", "asc")->paginate(12);
                break;
            case 'nameDesc': 
                $data = DB::table("products")->orderBy("name", "desc")->paginate(12);
                break;
            case 'priceAsc': 
                $data = DB::table("products")->orderBy("price", "asc")->paginate(12);
                break;
            case 'priceDesc': 
                $data = DB::table("products")->orderBy("price", "desc")->paginate(12);
                break;
        } 
        return view("frontend.pages.products.products", compact('data', "order",'count', 'brand'));
    }
    function products($id) {
        $data = DB::table('products')->where("category_id", "=", $id)->paginate(12);
        $count = DB::table('products')->where("category_id", "=", $id)->count();
        $brand = DB::table('categories')->where('parent_id', "!=", "0")->get();
        $order = request()->get("order");
        switch ($order) {
            case 'nameAsc': 
                $data = DB::table("products")->orderBy("name", "asc")->paginate(12);
                break;
            case 'nameDesc': 
                $data = DB::table("products")->orderBy("name", "desc")->paginate(12);
                break;
            case 'priceAsc': 
                $data = DB::table("products")->orderBy("price", "asc")->paginate(12);
                break;
            case 'priceDesc': 
                $data = DB::table("products")->orderBy("price", "desc")->paginate(12);
                break;
        } 
        $record = DB::table("categories")->where("id", "=", $id)->first();
        $name = isset($record->name) ? $record->name : "";
        return view("frontend.pages.products.products", compact(['data', "order","name",'brand','count']));
    }
    function productsDetail($id) {
        $record = DB::table('products')->where("id", "=", $id)->first();
        $detail = $record->name;
        $star = $this->getStart($id);
        $detailImages = $this->getImagesDetail($id);
        return view("frontend.pages.products.products_detail", compact(["record", "detail", 'star',"detailImages"]));
    }
    public function search(Request $request){
		$key = request('key');
		$data = DB::table("products")->where("name","like",'%'.$key.'%')->orWhere("description","like",'%'.$key.'%')->orWhere("content","like",'%'.$key.'%')->paginate(12);
        $name   =   "Tìm kiếm sản phẩm";
        $brands = StaticController::getBrands();
        $records = $data->count();
		return view("frontend.pages.products.search",["key"=>$key,"data"=>$data,'records'=> $records, "name"=>$name, "brands"=>$brands]);
}
public function ajax(){
    $key = request('key');
    $data = DB::table("products")->where("name","like",'%'.$key.'%')->orWhere("description","like",'%'.$key.'%')->orWhere("content","like",'%'.$key.'%')->select('name','id','photo')->get();
    $str = "";
    foreach($data as $row){
        $str =  $str."<li><img src='".asset('upload/products/'.$row->photo)."'> <a href='".url('products/detail/'.$row->id)."'>".$row->name."</a></li>";
    }
    echo $str;
}
public function comment(Request $request, $id){
    $customer_id = session()->get("customer_id");
    if($customer_id != null) {
        $star = $request->get('rating');
        $comment = $request->get('comment');
        $now = now();
        $date = $now->format("Y/m/d");
        DB::table('rating')->insert(['star'=>$star, 'customer_id'=>$customer_id, 'comment'=>$comment, 'product_id'=>$id, 'date'=>$date]);
        return redirect(url("/products/detail/$id"));
    } else {
        return redirect(url('customers/login'));
    };
    
}
public function getStart($id) {
    $data= DB::table('rating')->where("product_id", '=', $id)->orWhere("star", '=', 5)->get();
    return $data->count();
}
public function getImagesDetail($id) {
    $data = DB::table('products_images')->where("product_id", '=', $id)->get();
    return $data;
}
}