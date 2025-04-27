<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    protected $table = 'fans';
    protected $fillable = ['name', 'cpf', 'email', 'favorite_sport', 'favorite_player', 'birth_date'];
}
