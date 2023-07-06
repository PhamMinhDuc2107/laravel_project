<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Components\StaticController;
use App\Models\Products;
use App\Models\ProductImgs;
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
	public function updatePost(Request $request,$id){
		$this->modelUpdate($request,$id);
		return redirect(url("backend/products"))->with('msg', 'Cập nhật thành công');
	}
	public function create(){
		$category = $this->getCategories();
		$brand = $this->getBrands();
		$action = url("backend/products/create-post/");
		return view("admin.products.create_update",["action"=>$action, 'category'=>$category, "brand"=>$brand]);
	}
	public function createPost(Request $request){
		$this->modelCreate($request);
		return redirect(url("backend/products"))->with('msg', "Thêm sản phẩm thành công");
	}
	public function delete($id){
		$this->modelDelete($id);
		return redirect(url("backend/products"));
	}
	// model
	public function modelRead(){
		$data = Products::orderBy("id","desc")->paginate(5);
		return $data;
	}
	
	public function modelGetRow($id){
		$record = Products::where("id","=",$id)->first();
		return $record;
	}
	public function modelUpdate(Request $request,$id){
		$name = $request->get("name");
		$category_id = $request->get("category_id");
		$brand_id = $request->get("brand_id");
		$price = $request->get("price");
		$discount = $request->get("discount");
		$hot = $request->get("hot") != "" ? 1 : 0;
		$description = $request->get("description");
		$content = $request->get("content");
		Products::where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"brand_id"=>$brand_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"price"=>$price,"discount"=>$discount]);
		if($request->hasFile("photo")){
			$record = Products::where("id","=",$id)->first();
			if(file_exists('upload/products/'.$record->photo))
				unlink('upload/products/'.$record->photo);
			$file_name = $request->file("photo")->getClientOriginalName();
			$file_name = time()."_".$file_name;
			$request->file("photo")->move("upload/products",$file_name);
			Products::where("id","=",$id)->update(["photo"=>$file_name]);
		}
		if($request->hasFile("photo_detail")){
			$records = ProductImgs::where("product_id","=",$id)->get();
			$photoDetail = $request->file('photo_detail');
			if($records != null) {
				foreach($records as $record) {
					if(file_exists('upload/products/'.$record->photo_detail))
					unlink('upload/products/'.$record->photo_detail);
				}
				foreach($photoDetail as $item) {
					$file_name = $item->getClientOriginalName();
					$file_name = time()."_".$file_name;
					$item->move("upload/products",$file_name);
					ProductImgs::where("product_id","=",$id)->orWhere('id', '=', $record->id)->update(["photo_detail"=>$file_name]);
			}
			} 
			
		}
		
	}
	public function modelCreate(Request $request){
		$name = $request->get("name");
		$category_id = $request->get("category_id");
		$brand_id = $request->get("brand_id");
		$price = $request->get("price");
		$discount = $request->get("discount");
		$hot = $request->get("hot") != "" ? 1 : 0;
		$description = $request->get("description");
		$content = $request->get("content");
		$photo = "";
		if($request->hasFile("photo")){
			$file_name = $request->file("photo")->getClientOriginalName();
			$photo = time()."_".$file_name;
			$request->file("photo")->move("upload/products",$photo);
		}
		 $id = Products::insertGetId(["name"=>$name,"category_id"=>$category_id,"brand_id"=>$brand_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo,"price"=>$price,"discount"=>$discount]);
		$photoDetail = $request->file('photo_detail');
		if($photoDetail != null) {
			foreach($photoDetail as $photoItem) {
				$file_name = $photoItem->getClientOriginalName();
				$photo = time()."_".$file_name;
				$photoItem->move("upload/products",$photo);
				ProductImgs::insert(['product_id'=>$id, 'photo_detail'=>$photo]);
			}
		}
	}
	public function modelDelete($id){
		$record = Products::where("id","=",$id)->first();
		$images = ProductImgs::where("product_id","=",$id)->get();
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
		Products::where("id","=",$id)->delete();
		ProductImgs::where("product_id","=",$id)->delete();
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