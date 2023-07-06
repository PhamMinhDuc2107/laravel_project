<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeShip extends Model
{
    use HasFactory;
    protected $table = "feeships";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'matp', 'maqh', 'xaid','feeship'];
}