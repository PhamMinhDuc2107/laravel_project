<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $table = "xaphuongthitran";
    protected $primaryKey = 'xaid';

    protected $fillable = ['xaid', 'name_xaphuong', 'type' , 'mqh'];
}