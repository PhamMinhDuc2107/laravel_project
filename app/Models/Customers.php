<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'email', 'address', "phone", 'password','image'];

}