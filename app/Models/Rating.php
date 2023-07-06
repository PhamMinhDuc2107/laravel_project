<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table='ratings';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'comment', 'star', "product_id"];
}