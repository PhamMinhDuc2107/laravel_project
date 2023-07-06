<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'customer_id', 'shipping_id', 'quantity', 'total', "date", 'order_status', 'coupon_id','feeship'];
}