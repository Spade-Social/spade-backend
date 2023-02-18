<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFunPlace extends Model
{
    protected $table = 'user_fun_places';

    protected $fillable = [
        'user_id','fun_place'
    ];

    use HasFactory;
}
