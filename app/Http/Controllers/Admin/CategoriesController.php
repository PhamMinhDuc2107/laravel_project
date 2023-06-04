<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    
    public function read(Request $request){
        $search = $request->input("search") ?? "";
        if($search != "" ) {
            $data = DB::table("categories")->where("name", "like", "%$search%")->get();
        }else {
            $data = DB::table('categories')->where("parent_id","=","0")->orderBy("id","desc")->paginate(4);

        }
        return view("admin.categories.read",compact(['data', 'search']));
    }
    public function edit(Request $request,$id){
        $record = DB::table('categories')->where("id","=",$id)->first();
        $action = url('backend/categories/edit-post/'.$id);
        return view("admin.categories.create_update",["record"=>$record,"action"=>$action]);
        
    }
    public function editPost(Request $request,$id){
        $name = $request->get("name");
        $parent_id = $request->get("parent_id");
        $display_at_home_page = $request->get("hot") != "" ? 1 : 0;
        //update name
        DB::table('categories')->where("id","=",$id)->update(["name"=>$name,"parent_id"=>$parent_id, "display_at_home_page"=>$display_at_home_page]);
        return redirect(url('backend/categories'));
    }
    public function create(Request $request){
        $action = url('backend/categories/create-post');
        return view("admin.categories.create_update",["action"=>$action]);
    }
    public function createPost(Request $request){
        $name = $request->get("name");
        $parent_id = $request->get("parent_id");
        $display_at_home_page = $request->get("hot") != "" ? 1 : 0;
        DB::table('categories')->insert(["name"=>$name,"parent_id"=>$parent_id, "display_at_home_page"=>$display_at_home_page ]);
        return redirect(url('backend/categories'));
    }
    public function delete(Request $request,$id){
        $record = DB::table('categories')->where("id","=",$id)->orWhere("parent_id","=",$id)->delete();
        return redirect(url('backend/categories'));
    }
}