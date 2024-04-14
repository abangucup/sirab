<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instansi_id')->constrained()->onDelete('cascade');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_istrahat');
            $table->time('jam_tutup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pelayanans');
    }
};
