<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Components\StaticController;

class ProductsController extends Controller{
	
	public function read(){
		$data = $this->modelRead();
		return view("admin.products.read",["data"=>$data]);
	}
	public function update($id){
		$record = $this->modelGetRow($id);
		$action = url("backend/products/update-post/$id");
		$category = $this->getCategories();
		$brand = StaticController::getBrands($record->brand_id);
		return view("admin.products.create_update",compact(['record', 'action', 'brand','category']));
	}
	public function updatePost($id){
		$this->modelUpdate($id);
		return redirect(url("backend/products"))->with('msg', 'Cập nhật thành công');
	}
	public function create(){
		$category = $this->getCategories();
		$brand = $this->getBrands();
		$action = url("backend/products/create-post/");
		return view("admin.products.create_update",["action"=>$action, 'category'=>$category, "brand"=>$brand]);
	}
	public function createPost(){
		$this->modelCreate();
		return redirect(url("backend/products"))->with('msg', "Thêm sản phẩm thành công");
	}
	public function delete($id){
		$this->modelDelete($id);
		return redirect(url("backend/products"));
	}
	// model
	public function modelRead(){
		$data = DB::table("products")->orderBy("id","desc")->paginate(5);
		return $data;
	}
	
	public function modelGetRow($id){
		$record = DB::table("products")->where("id","=",$id)->first();
		return $record;
	}
	public function modelUpdate($id){
		$name = Request::get("name");
		$category_id = Request::get("category_id");
		$brand_id = Request::get("brand_id");
		$price = Request::get("price");
		$discount = Request::get("discount");
		$hot = Request::get("hot") != "" ? 1 : 0;
		$description = Request::get("description");
		$content = Request::get("content");
		DB::table("products")->where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"brand_id"=>$brand_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"price"=>$price,"discount"=>$discount]);
		if(Request::hasFile("photo")){
			$record = DB::table("products")->where("id","=",$id)->first();
			if(file_exists('upload/products/'.$record->photo))
				unlink('upload/products/'.$record->photo);
			$file_name = Request::file("photo")->getClientOriginalName();
			$file_name = time()."_".$file_name;
			Request::file("photo")->move("upload/products",$file_name);
			DB::table("products")->where("id","=",$id)->update(["photo"=>$file_name]);
		}
		if(Request::hasFile("photo_detail")){
			$records = DB::table("products_images")->where("product_id","=",$id)->get();
			$photoDetail = Request::file('photo_detail');
			if($records != null) {
				foreach($records as $record) {
					if(file_exists('upload/products/'.$record->photo_detail))
					unlink('upload/products/'.$record->photo_detail);
				}
				foreach($photoDetail as $item) {
					$file_name = $item->getClientOriginalName();
					$file_name = time()."_".$file_name;
					$item->move("upload/products",$file_name);
					DB::table("products_images")->where("product_id","=",$id)->orWhere('id', '=', $record->id)->update(["photo_detail"=>$file_name]);
			}
			} 
			
		}
		
	}
	public function modelCreate(){
		$name = Request::get("name");
		$category_id = Request::get("category_id");
		$brand_id = Request::get("brand_id");
		$price = Request::get("price");
		$discount = Request::get("discount");
		$hot = Request::get("hot") != "" ? 1 : 0;
		$description = Request::get("description");
		$content = Request::get("content");
		$photo = "";
		if(Request::hasFile("photo")){
			$file_name = Request::file("photo")->getClientOriginalName();
			$photo = time()."_".$file_name;
			Request::file("photo")->move("upload/products",$photo);
		}
		 $id = DB::table("products")->insertGetId(["name"=>$name,"category_id"=>$category_id,"brand_id"=>$brand_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo,"price"=>$price,"discount"=>$discount]);
		$photoDetail = Request::file('photo_detail');
		if($photoDetail != null) {
			foreach($photoDetail as $photoItem) {
				$file_name = $photoItem->getClientOriginalName();
				$photo = time()."_".$file_name;
				$photoItem->move("upload/products",$photo);
				DB::table('products_images')->insert(['product_id'=>$id, 'photo_detail'=>$photo]);
			}
		}
	}
	public function modelDelete($id){
		$record = DB::table("products")->where("id","=",$id)->first();
		$images = DB::table("products_images")->where("product_id","=",$id)->get();
		if($record->photo != null) {
			if(file_exists('upload/products/'.$record->photo)){
				unlink('upload/products/'.$record->photo);
			}
		}
		if($images != null) {
			foreach($images as $item){
				if(file_exists('upload/products/'.$item->photo_detail)){
					unlink('upload/products/'.$item->photo_detail);
				}
			}
		}
		DB::table("products")->where("id","=",$id)->delete();
		DB::table("products_images")->where("product_id","=",$id)->delete();
	}
	public  function getCategories() {
		$data = DB::table('categories')->where("parent_id", "=", "0")->orderBy("id", "desc")->get();
		return $data;
	}
	public  function getBrands() {
		$data = DB::table('categories')->where("parent_id", "!=", "0")->orderBy("id", "desc")->get();
		return $data;
	}
}