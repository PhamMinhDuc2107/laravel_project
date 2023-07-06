<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sliders;

class SlidersController extends Controller
{
    function read() {
        $data = Sliders::paginate(20);
        return view('admin.sliders.read', compact('data'));
    }
    function edit($id) {
        $action = "backend/sliders/edit-post/".$id;
        $record = Sliders::where("id", "=", $id)->first();
        return view("admin.sliders.create_update", compact(["action", "record"]));
    }
    function editPost(Request $request, $id) {
        $record = Sliders::where("id", '=', $id)->first();
        $name = $request->input('name');
        $image = $request->file('image');
        $active = $request->input('active') ? 1 : 0;
        if($image) {
            if(file_exists('upload/sliders/'.$record->images)) {
                unlink("upload/sliders/$record->images");
            }
            $record->images = $image; 
        }
        $record->name = $name;
        $record->active = $active;
        $record->save();
        return redirect((url("backend/sliders")))->with(["msg"=>'Cập nhật thành công']);
    }
    function create() {
        $action = "backend/sliders/create-post";
        return view("admin.sliders.create_update", compact('action'));
    }
    function createPost(Request $request) {
        $name = request("name");
        $image = "";
        $active = request("active") ? 1 : 0;
        if($request->hasFile("image")){
			$file_name = $request->file("image")->getClientOriginalName();
			$image = time()."_".$file_name;
			$request->file("image")->move("upload/sliders",$image);
		}
        Sliders::insert(['name'=>$name, 'images'=>$image, "active"=>$active]);
        return redirect(url("backend/sliders"))->with(['msg'=>"Thêm thành công"]);
    }
    function delete($id) {
        $sliders = Sliders::find($id);
        if($sliders) {
            $sliders->delete();
        }
        return redirect(url("backend/sliders"));
    }
}