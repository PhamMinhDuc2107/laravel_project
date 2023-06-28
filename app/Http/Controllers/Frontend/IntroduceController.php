<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    function read() {
        $name ="Giới thiệu";
        return view("frontend.pages.introduce.read", compact('name'));
    }
}