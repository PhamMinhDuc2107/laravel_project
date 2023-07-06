<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;
    protected $table = "Sliders";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'images', "active"];
}