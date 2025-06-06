<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
       Schema::create('animal', function (Blueprint $table) {
    $table->id();
    $table->string('nome');
    $table->string('tipo');
    $table->string('raca');
    $table->integer('idade');
    $table->timestamps(); // <- esta linha adiciona created_at e updated_at
});

    }

    public function down()
    {
        Schema::dropIfExists('animal');
    }
};