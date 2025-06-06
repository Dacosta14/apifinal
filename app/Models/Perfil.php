<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    // 🏗️ Força o Laravel a usar o nome correto da sua tabela
    protected $table = 'perfis';

    // 🏗️ Lista dos campos que podem ser preenchidos
    protected $fillable = [
        'foto',
        'nome',
        'email',
        'data_nascimento',
        'departamento',
        'supervisor',
        'grupos',
    ];
}
