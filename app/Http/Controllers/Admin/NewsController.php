<?php 

namespace App\Http\Controllers\Admin;
use App\Models\Admin\NewsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller{
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
	public function updatePost(Request $request,$id){
		$this->modelNewsUpdate($request, $id);
		return redirect(url("backend/news"));
	}
	public function create(){
		$action = url("backend/news/create-post/");
		return view("admin.news.create_update",["action"=>$action]);
	}
	public function createPost(Request $request){
		$this->modelNewsCreate($request);
		return redirect(url("backend/news"));
	}
	public function delete($id){
		$this->modelNewsDelete($id);
		return redirect(url("backend/news"));
	}
	function modelGetRecords() {
		$data = News::orderBy("id", "desc")->paginate(50);
		return $data;
	}
	function modelGetRecord($id) {
		$data = News::where("id", "=", $id)->first();
		return $data;
	}
	function modelNewsCreate(Request $request) {
		$name = $request->get("name");
		$date = $request->get("date");
		$description = $request->get("description");
		$content = $request->get("content");
		$hot = $request->get("hot") != "" ? 1 : 0;
		$photo = "";
		if($request->hasFile('photo')) {
			$file_name = $request->file("photo")->getClientOriginalName();
			$photo = uniqid()."_".$file_name;
			$request->file('photo')->move("upload/news", $photo);
		}
		News::insert(["name"=>$name,'date'=>$date, 'description'=>$description, "content"=>$content, "hot"=>$hot, "photo"=>$photo]);
	}
	function modelNewsUpdate(Request $request,$id) {
		$name = $request->get("name");
		$date = $request->get("date");
		$description = $request->get("description");
		$content = $request->get("content");
		$hot = $request->get("hot") != "" ? 1 : 0;
		News::where('id', "=", $id)->update(compact(['name', "description", "content", "hot", 'date']));
		if($request->hasFile("photo")) {
			$record = News::where("id", "=", $id)->first();

			if(file_exists("upload/news/$record->photo")) {
				unlink("upload/news/$record->photo");
			}
			$file_name = $request->file('photo')->getClientOriginalName();
			$file_name = uniqid()."_".$file_name;
			$request->file("photo")->move("upload/news",$file_name);
			News::where("id", '=', $id)->update(['photo'=>$file_name]);
		}
	}
	function modelNewsDelete($id) {
		$record = News::where("id", "=", $id)->first();
		if(file_exists("upload/news/$record->photo")) {
			unlink("upload/news/$record->photo");
		}
		News::where("id", "=", $id)->delete();
	}
}