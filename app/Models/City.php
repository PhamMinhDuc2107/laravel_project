<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = "thanhpho";
    protected $primaryKey = 'matp';
    protected $fillable = ['matp', 'name_city','type', 'matp'];
}