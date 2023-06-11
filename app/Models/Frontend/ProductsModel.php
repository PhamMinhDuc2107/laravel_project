<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;


class ProductsModel extends Model
{
    use HasFactory;
    function readModel() {
        $data = DB::table("products")->orderBy("id", "desc")->paginate(12);
        return $data;
    }
}