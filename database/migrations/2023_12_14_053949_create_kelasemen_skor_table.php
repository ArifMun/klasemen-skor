<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelasemen_skor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klub');
            $table->foreign('id_klub')->references('id')->on('data_klub');
            $table->integer('main');
            $table->integer('menang');
            $table->integer('seri');
            $table->integer('kalah');
            $table->integer('gol_menang');
            $table->integer('gol_kalah');
            $table->integer('point');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelasemen_skor');
    }
};
