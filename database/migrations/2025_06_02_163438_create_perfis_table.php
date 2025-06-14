<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
    Schema::create('perfis', function (Blueprint $table) {
        $table->id();
        $table->string('foto')->nullable();
        $table->string('nome');
        $table->string('email')->unique();
        $table->date('data_nascimento')->nullable();

        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('perfis');
    }
};
