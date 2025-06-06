<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    // Corrige o nome da tabela
    protected $table = 'perfis';

    protected $fillable = [
        'foto',
        'nome',
        'email',
        'data_nascimento',
        'departamento',
        'supervisor',
        'grupos',
    ];

    protected $appends = ['foto_url'];

    public function getFotoUrlAttribute()
    {
        return $this->foto ? url('fotos/' . $this->foto) : null;
    }
}
