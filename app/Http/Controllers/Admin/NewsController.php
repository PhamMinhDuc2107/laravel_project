<?php 

namespace App\Http\Controllers\Admin;
use App\Models\Admin\NewsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//khai báo class News
use App\MyCustomClass\News;

class NewsController extends Controller{
	protected $table = 'news';
	public function read(Request $request){
		$search = $request->input("search") ?? "";
		if($search != "" ) {
			$data = $this->modelSearch($search);
		}else {
			$data = $this->modelGetRecords();
		}
		return view("admin.news.read",["data"=>$data]);
	}
	public function update($id){
		$record = $this->modelGetRecord($id);
		$action = url("backend/news/update-post/$id");
		return view("admin.news.create_update",["record"=>$record,"action"=>$action]);
	}
	public function updatePost($id){
		$this->modelNewsUpdate($id);
		return redirect(url("backend/news"));
	}
	public function create(){
		$action = url("backend/news/create-post/");
		return view("admin.news.create_update",["action"=>$action]);
	}
	public function createPost(){
		$this->modelNewsCreate();
		return redirect(url("backend/news"));
	}
	public function delete($id){
		$this->modelNewsDelete($id);
		return redirect(url("backend/news"));
	}
	function modelGetRecords() {
		$data = DB::table($this->table)->orderBy("id", "desc")->paginate(50);
		return $data;
	}
	function modelGetRecord($id) {
		$data = DB::table($this->table)->where("id", "=", $id)->first();
		return $data;
	}
	function modelNewsCreate() {
		$name = Request::get("name");
		$date = Request::get("date");
		$description = Request::get("description");
		$content = Request::get("content");
		$hot = Request::get("hot") != "" ? 1 : 0;
		$photo = "";
		if(Request::hasFile('photo')) {
			$file_name = Request::file("photo")->getClientOriginalName();
			$photo = uniqid()."_".$file_name;
			Request::file('photo')->move("upload/news", $photo);
		}
		DB::table($this->table)->insert(["name"=>$name,'date'=>$date, 'description'=>$description, "content"=>$content, "hot"=>$hot, "photo"=>$photo]);
	}
	function modelNewsUpdate($id) {
		$name = Request::get("name");
		$date = Request::get("date");
		$description = Request::get("description");
		$content = Request::get("content");
		$hot = Request::get("hot") != "" ? 1 : 0;
		DB::table($this->table)->where('id', "=", $id)->update(compact(['name', "description", "content", "hot", 'date']));
		if(Request::hasFile("photo")) {
			$record = DB::table($this->table)->where("id", "=", $id)->first();

			if(file_exists("upload/news/$record->photo")) {
				unlink("upload/news/$record->photo");
			}
			$file_name = Request::file('photo')->getClientOriginalName();
			$file_name = uniqid()."_".$file_name;
			Request::file("photo")->move("upload/news",$file_name);
			DB::table($this->table)->where("id", '=', $id)->update(['photo'=>$file_name]);
		}
	}
	function modelNewsDelete($id) {
		$record = DB::table($this->table)->where("id", "=", $id)->first();
		if(file_exists("upload/news/$record->photo")) {
			unlink("upload/news/$record->photo");
		}
		DB::table($this->table)->where("id", "=", $id)->delete();
	}
}