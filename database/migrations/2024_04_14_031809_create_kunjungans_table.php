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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained()->onDelete('cascade');
            $table->foreignId('kasus_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_berkunjung')->nullable();
            $table->unsignedBigInteger('puskesmas_kunjungan');
            $table->enum('cuci_luka', ['Ya', 'Tidak'])->nullable();
            $table->text('hasil_pemeriksaan');

            $table->foreign('puskesmas_kunjungan')->references('id')->on('instansis');

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
        Schema::dropIfExists('kunjungans');
    }
};
