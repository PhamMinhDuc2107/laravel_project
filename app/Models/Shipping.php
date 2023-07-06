<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table = "Shippings";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'phone', "email", "address", "notes", "method"];
}