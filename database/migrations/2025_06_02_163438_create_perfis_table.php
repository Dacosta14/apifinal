<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
 Schema::create('perfis', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('email')->unique();
        $table->string('password'); // essencial para login!
        $table->date('data_nascimento')->nullable();
        $table->string('departamento')->nullable();
        $table->string('supervisor')->nullable();
        $table->string('grupos')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('perfis');
    }
};
