<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    function read() {
        $categories = DB::table('categories')->orderBy("id", "desc")->where("parent_id", "=", "0")->paginate(10);
        $subCategories = DB::table('categories')->where("parent_id",'!=', "0")->get();
        return view("admin.categories.read", compact('categories',"subCategories"));
    }
    function edit($id) {
        $action = "backend/categories/edit-post/".$id;
        $record = DB::table('categories')->where("id", "=", $id)->first();
        return view("admin.categories.create_update", compact(["action", "record"]));
    }
    function editPost(Request $request, $id) {
        $email = request('email');
        $name = request('name');
        $password = request('password');
        DB::table('categories')->where("id", '=', $id)->update(['name'=>$name, "email"=>$email]);
        return redirect((url("backend/categories")));
    }
    function create() {
        $action = "backend/categories/create-post";
        return view("admin.categories.create_update", compact('action'));
    }
    function createPost() {
        $name = request("name");
        $id = DB::table("categories")->where("name", "==", $name)->value('id');
        $subCate = request("subCate");
        if(DB::table('categories')->where("name", "!=", $name) && $id = null) { 
            DB::table("categories")->insert(['name'=>$name, "parent_id"=>"0"]); 
            $id = DB::table("categories")->where("name", "==", $name)->value('id');
        }
        DB::table("categories")->insert(['name'=>$subCate, 'parent_id'=>$id]);
        return redirect(url("backend/categories"));
    }
    function delete($id) {
        DB::table('categories')->where("id", "=", $id)->delete();
        return redirect(url("backend/categories"));
    }
}