<?php 

namespace App\Http\Controllers\Admin;
use App\Models\Admin\NewsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//khai báo class News
use App\MyCustomClass\News;

class NewsController extends Controller{
	public $model;
	public function __construct(){
		$this->model = new NewsModel();
	} 
	public function read(Request $request){
		$search = $request->input("search") ?? "";
		if($search != "" ) {
			$data = $this->model->modelSearch($search);
		}else {
			$data = $this->model->modelGetRecords();
		}
		return view("admin.news.read",["data"=>$data]);
	}
	public function update($id){
		$record = $this->model->modelGetRecord($id);
		$action = url("backend/news/update-post/$id");
		return view("admin.news.create_update",["record"=>$record,"action"=>$action]);
	}
	public function updatePost($id){
		$this->model->modelNewsUpdate($id);
		return redirect(url("backend/news"));
	}
	public function create(){
		//tạo biến $action để đưa vào thuộc tính action của thẻ form
		$action = url("backend/news/create-post/");
		return view("admin.news.create_update",["action"=>$action]);
	}
	public function createPost(){
		$this->model->modelNewsCreate();
		return redirect(url("backend/news"));
	}
	public function delete($id){
		$this->model->modelNewsDelete($id);
		return redirect(url("backend/news"));
	}
}