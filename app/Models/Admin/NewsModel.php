<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rules\Unique;

class NewsModel extends Model
{
    use HasFactory;
    public $table = "news";
    function modelGetRecords() {
        $data = DB::table($this->table)->orderBy("id", "desc")->paginate(50);
        return $data;
    }
    function modelSearch($search) {
        $data= DB::table($this->table)->orderBy("id", "desc")->where("name", "like", "%$search%")->get();
        return $data;
    }
    function modelGetRecord($id) {
        $record = DB::table($this->table)->where("id", "=", $id)->first();
        return $record;
    }
    function modelUpdate($id) {
        $name = Request::get('name');
        $hot = Request::get('hot') != "" ? 1 : 0;
        $description = Request::get('description');
        $content = Request::get('content'); 
        DB::table($this->table)->where("id", "=", $id)->update(['name'=>$name, "description"=>$description, "content"=>$content, "hot"=>$hot]);
        if(Request::hasFile("photo")) {
            // Xóa ảnh cũ
            $record = DB::table($this->table)->where    ("id", "=", $id)->first();
            if(file_exists("upload/news/".$record->photo)) {
                unlink("upload/news/".$record->photo);
            }
            // Thêm ảnh mới
            $file_name = Request::file("photo")->getClientOriginalName();
            $file_name = time()."_".$file_name;
            Request::file("photo")->move("upload/news",$file_name);
			DB::table("news")->where("id","=",$id)->update(["photo"=>$file_name]);
        }
    }
    public function modelCreate(){
		$name = Request::get("name");
		$hot = Request::get("hot") != "" ? 1 : 0;
		$description = Request::get("description");
		$content = Request::get("content");
		$photo = "";
		if(Request::hasFile("photo")){
			$file_name = Request::file("photo")->getClientOriginalName();
			$photo = time()."_".$file_name;
			Request::file("photo")->move("upload/news",$photo);
		}
		DB::table("news")->insert(["name"=>$name,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo]);
	}
	public function modelDelete($id){
		//---
		//lấy ảnh cũ để xóa
		$record = DB::table("news")->where("id","=",$id)->first();
		if(file_exists('upload/news/'.$record->photo))
			unlink('upload/news/'.$record->photo);//xóa ảnh
		//---
		//xóa bản ghi
		DB::table("news")->where("id","=",$id)->delete();
	}
}