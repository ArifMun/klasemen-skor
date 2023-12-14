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
        Schema::create('data_skor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klub_1');
            $table->foreign('id_klub_1')->references('id')->on('data_klub');
            $table->unsignedBigInteger('id_klub_2');
            $table->foreign('id_klub_2')->references('id')->on('data_klub');
            $table->integer('skor_1');
            $table->integer('skor_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_skor');
    }
};
