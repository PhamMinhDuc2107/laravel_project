<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $table = "socials";
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'provider_user_id', 'provider', "user"];
}