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
        Schema::create('kasus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_gigitan')->nullable();
            $table->enum('hewan_rabies', ['Anjing', 'Kucing', 'Kera', 'DLL'])->nullable();
            $table->string('lokasi_gigitan')->nullable();
            $table->enum('kondisi', ['Sembuh', 'Mati', 'Sakit'])->nullable();
            $table->text('gejala')->nullable();
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
        Schema::dropIfExists('kasus');
    }
};
