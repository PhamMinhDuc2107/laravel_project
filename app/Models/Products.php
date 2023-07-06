<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'description', "content", 'photo', 'price','discount', 'category_id', 'brand_id', 'hot'];

}