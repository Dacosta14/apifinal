<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Animal extends Model
{
    protected $table = 'animal';

    protected $fillable = ['tipo', 'raca', 'nome', 'idade'];
}  
