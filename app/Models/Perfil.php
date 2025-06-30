<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Perfil extends Authenticatable
{
    use HasApiTokens, Notifiable;
    // Força o nome da tabela para "perfis"
    protected $table = 'perfis';
    protected $fillable = [
        'nome', 'email', 'password', 'data_nascimento', 'departamento', 'supervisor', 'grupos', 'foto'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
