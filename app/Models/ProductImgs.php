<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImgs extends Model
{
    use HasFactory;
    protected $table = "product_imgs";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'photo_detail', 'product_id'];
}