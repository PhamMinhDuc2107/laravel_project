<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\HomeModel;

class HomeController extends Controller
{
    protected $model;
    function __construct() {
        $this->model = new HomeModel();
    }
    function index() {
        // $category = $this->model->getCategories($id);
        $products = $this->model->getProducts();
        return view("frontend.pages.home", compact(['products']));
    }
}