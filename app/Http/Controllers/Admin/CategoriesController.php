<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function read(Request $request){
        $data = DB::table('categories')->where("parent_id","=","0")->orderBy("id","desc")->paginate(4);
        return view("admin.categories.read",["data"=>$data]);
    }
    public function edit(Request $request,$id){
        $record = DB::table('categories')->where("id","=",$id)->first();
        $action = url('backend/categories/edit-post/'.$id);
        return view("admin.categories.create_update",["record"=>$record,"action"=>$action]);
        
    }
    public function editPost(Request $request,$id){
        $name = $request->get("name");
        $parent_id = $request->get("parent_id");
        //update name
        DB::table('categories')->where("id","=",$id)->update(["name"=>$name,"parent_id"=>$parent_id]);
        return redirect(url('backend/categories'));
    }
    public function create(Request $request){
        $action = url('backend/categories/create-post');
        return view("admin.categories.create_update",["action"=>$action]);
    }
    public function createPost(Request $request){
        $name = $request->get("name");
        $parent_id = $request->get("parent_id");
        DB::table('categories')->insert(["name"=>$name,"parent_id"=>$parent_id]);
        return redirect(url('backend/categories'));
    }
    public function delete(Request $request,$id){
        $record = DB::table('categories')->where("id","=",$id)->orWhere("parent_id","=",$id)->delete();
        return redirect(url('backend/categories'));
    }
}