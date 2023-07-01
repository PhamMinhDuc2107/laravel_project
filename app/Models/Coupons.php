<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table = "coupons";
    protected $fillable = ['code', 'discount_amount', 'discount_percentage' , 'quantity', 'time_start', 'time_end'];

}