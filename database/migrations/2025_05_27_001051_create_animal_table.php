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
            $table->string('tipo', 15);
            $table->string('raca', 20);
            $table->string('nome', 20);
            $table->integer('idade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('animal');
    }
};