<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ProductsModel extends Model
{
    use HasFactory;
    public function modelRead(){
		$data = DB::table("products")->orderBy("id","desc")->paginate(50);
		return $data;
	}
	public static function getCategoryName($category_id){
		$record = DB::table("categories")->where("id","=",$category_id)->first();
		return isset($record->name) ? $record->name : "";
	}
	public function modelGetRow($id){
		$record = DB::table("products")->where("id","=",$id)->first();
		return $record;
	}
	public function modelUpdate($id){
		$name = Request::get("name");//có thể sử dụng hàm request("name")
		$category_id = Request::get("category_id");
		$price = Request::get("price");
		$discount = Request::get("discount");
		$hot = Request::get("hot") != "" ? 1 : 0;
		$description = Request::get("description");
		$content = Request::get("content");
		//update bản ghi
		DB::table("products")->where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"price"=>$price,"discount"=>$discount]);
		//nếu có upload ảnh thì update
		if(Request::hasFile("photo")){
			//---
			//lấy ảnh cũ để xóa
			$record = DB::table("products")->where("id","=",$id)->first();
			if(file_exists('upload/products/'.$record->photo))
				unlink('upload/products/'.$record->photo);//xóa ảnh
			//---
			$file_name = Request::file("photo")->getClientOriginalName();
			$file_name = time()."_".$file_name;
			Request::file("photo")->move("upload/products",$file_name);
			DB::table("products")->where("id","=",$id)->update(["photo"=>$file_name]);
		}
	}
	public function modelCreate(){
		$name = Request::get("name");//có thể sử dụng hàm request("name")
		$category_id = Request::get("category_id");
		$price = Request::get("price");
		$discount = Request::get("discount");
		$hot = Request::get("hot") != "" ? 1 : 0;
		$description = Request::get("description");
		$content = Request::get("content");
		$photo = "";
		//nếu có upload ảnh
		if(Request::hasFile("photo")){
			$file_name = Request::file("photo")->getClientOriginalName();
			$photo = time()."_".$file_name;
			Request::file("photo")->move("upload/products",$photo);
		}
		//create bản ghi
		DB::table("products")->insert(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo,"price"=>$price,"discount"=>$discount]);
		
	}
	public function modelDelete($id){
		//---
		//lấy ảnh cũ để xóa
		$record = DB::table("products")->where("id","=",$id)->first();
		if(file_exists('upload/products/'.$record->photo))
			unlink('upload/products/'.$record->photo);//xóa ảnh
		//---
		//xóa bản ghi
		DB::table("products")->where("id","=",$id)->delete();
	}
}