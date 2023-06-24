<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BlogController extends Controller
{
    function blog() {
        $data = DB::table('news')->orderBy("id", "desc")->paginate(6) ;
        $name = "Tin tức";
        $hot = $this->getBlogHot();
        return view("frontend.pages.blog.read",compact(['data','name','hot']));
    }
    function blogDetail($id) {
        $record = DB::table('news')->where("id", "=", $id)->first();
        $name = 'Tin tức';
        $hot = $this->getBlogHot();       
         $detail = $record->name;
        return view('frontend.pages.blog.detail', compact(['record', 'name', 'detail','hot']));
    }
    function getBlogHot() {
        $record = DB::table('news')->where("hot", '=', 1)->take(4)->get();
        return $record;
    }

}