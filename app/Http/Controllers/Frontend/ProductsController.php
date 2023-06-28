<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Components\StaticController;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Arr;

class ProductsController extends Controller
{
    protected $model;
    function read(Request $request) {
        $data = DB::table("products")->orderBy("id", "desc")->paginate(12);
        $brand = DB::table('categories')->where('parent_id', "!=", "0")->get();
        $urlName = "products";
        $query = DB::table("products")->orderBy("id", "desc");
        $count = $query->count();
        $order = request()->get("order");
        $min_price = $query->min('price') ;
        $max_price = $query->max('price');
        if($this->filterPriceBrand($request, $query, $order) != null) {
            $data = $this->filterPriceBrand($request, $query,$order)->orderBy('id', 'ASC')->paginate(12);
            $count = $this->filterPriceBrand($request, $query,$order)->count();
        }
        return view("frontend.pages.products.products", compact('data','count', 'brand',"urlName",'order','min_price','max_price'));
    }
    function sale(Request $request) {
        $urlName = "products/sale";
        $data = DB::table("products")->where('discount','>', "0")->orderBy("discount", "desc")->paginate(12);
        $brand = DB::table('categories')->where('parent_id', "!=", "0")->get();
        $query = DB::table("products")->where('discount','>', "0");
        $count = $query->count();
        $order = request()->get("order");
        $min_price = $query->min('price') ;
        $max_price = $query->max('price');
        if($this->filterPriceBrand($request, $query, $order) != null) {
            $data = $this->filterPriceBrand($request, $query,$order)->orderBy('id', 'ASC')->paginate(12);
            $count = $this->filterPriceBrand($request, $query,$order)->count();
        }
        $name =  "Sản phẩm khuyết mãi";
        return view("frontend.pages.products.products", compact('data', "order",'count', 'brand','name','urlName','min_price', 'max_price'));
    }
    function hot(Request $request) {
        $data = DB::table("products")->where('hot','!=', "0")->orderBy("id", "asc")->paginate(12);
        $query = DB::table("products")->where('hot','!=', "0");
        $count = $query->count();
        $brand = DB::table('categories')->where('parent_id', "!=", "0")->get();
        $order = request()->get("order");
        $min_price = $query->min('price') ;
        $max_price = $query->max('price');
        if($this->filterPriceBrand($request, $query, $order) != null) {
            $data = $this->filterPriceBrand($request, $query,$order)->orderBy('id', 'ASC')->paginate(12);
            $count = $this->filterPriceBrand($request, $query,$order)->count();
        }
        $urlName = "products/hot";
        $name   =   "Sản phẩm nổi bật";
        return view("frontend.pages.products.products", compact('data', "order",'count', 'brand','name','urlName','min_price', 'max_price'));
    }
    function news(Request $request) {
        $urlName = "products/news";
        $data = DB::table("products")->orderBy("id", "desc")->paginate(12);
        $brand = DB::table('categories')->where('parent_id', "!=", "0")->get();
        $order = request()->get("order");
        $query = DB::table('products');
        $count = $query->count();
        $min_price = $query->min('price') ;
        $max_price = $query->max('price');
        if($this->filterPriceBrand($request, $query, $order) != null) {
            $data = $this->filterPriceBrand($request, $query,$order)->orderBy('id', 'ASC')->paginate(12);
            $count = $this->filterPriceBrand($request, $query,$order)->count();
        }
        $name   =   "Sản phẩm mới";
        return view("frontend.pages.products.products", compact('data', "order",'count', 'brand','name','urlName','min_price', 'max_price'));
    }
    function products(Request $request,$id) {
        $data = DB::table('products')->where("category_id", "=", $id)->paginate(12);
        $query = DB::table('products')->where("category_id", "=", $id);
        $category = StaticController::getCategoryName($id);
        $brand = DB::table('categories')->where('parent_id', "!=", "0")->get();
        $order = request()->get("order");
        $count = $query->count();
        $min_price = $query->min('price') ;
        $max_price = $query->max('price');

        if($this->filterPriceBrand($request, $query, $order) != null) {
            $data = $this->filterPriceBrand($request, $query,$order)->orderBy('id', 'ASC')->paginate(12);
            $count = $this->filterPriceBrand($request, $query,$order)->count();
        }
        $urlName = "products/$id";
        $record = DB::table("categories")->where("id", "=", $id)->first();
        $name = isset($record->name) ? $record->name : "";
        return view("frontend.pages.products.products", compact(['data', "order","name",'brand','count','urlName',"min_price", "max_price"]));
    }
    function productsDetail($id) {
        $record = DB::table('products')->where("id", "=", $id)->first();
        $detail = $record->name;
        $star = $this->getStart($id);
        $productsRelateTo = StaticController::products($record->category_id);
        $productsHot = StaticController::productsHot($record->category_id);
        $detailImages = $this->getImagesDetail($id);
        return view("frontend.pages.products.products_detail", compact(["record", "detail", 'star',"detailImages","productsHot","productsRelateTo"]));
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
    public function order($order) {
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
        return $data;
    }
    public function query(Request $request,$table) {
            $brands = $request->input('filterBrand');
            $startPrice = $request->input('start_price');
            $endPrice = $request->input('end_price');
            $query = DB::table("$table");

            if ($brands) {
                $query->whereIn('brand_id', $brands);
            }
            if ($startPrice && $endPrice) {
                $query->whereBetween('price', [$startPrice, $endPrice]);
            }
        return $query;
    }
    public function filterPriceBrand(Request $request, $query, $order) {
        $brands = $request->input('filterBrand');
        $startPrice = $request->input('start_price');
        $endPrice = $request->input('end_price');
        if( request()->get('order')) {
            $order = $this->order($order);
        }elseif ($brands && $startPrice && $endPrice) {
            $query->whereIn('brand_id', $brands)
                ->whereBetween('price', [$startPrice, $endPrice]);
        } elseif ($brands) {
            $query->whereIn('brand_id', $brands);
        } elseif ($startPrice && $endPrice) {
            $query->whereBetween('price', [$startPrice, $endPrice]);
        }
        return $query;
    }
    //cart
    
}