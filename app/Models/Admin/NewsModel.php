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
    protected $table = "news";
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
			$description = Request::get("description");
			$content = Request::get("content");
			$hot = Request::get("hot") != "" ? 1 : 0;
			$photo = "";
			if(Request::hasFile('photo')) {
				$file_name = Request::file("photo")->getClientOriginalName();
				$photo = uniqid()."_".$file_name;
				Request::file('photo')->move("upload/news", $photo);
			}
			DB::table($this->table)->insert(["name"=>$name, 'description'=>$description, "content"=>$content, "hot"=>$hot, "photo"=>$photo]);
		}
		function modelNewsUpdate($id) {
			$name = Request::get("name");
			$description = Request::get("description");
			$content = Request::get("content");
			$hot = Request::get("hot") != "" ? 1 : 0;
			DB::table($this->table)->where('id', "=", $id)->update(compact(['name', "description", "content", "hot"]));
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