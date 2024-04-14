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
        Schema::disableForeignKeyConstraints();
        Schema::create('imunisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kunjungan_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_pemberian_var1')->nullable();
            $table->unsignedBigInteger('puskesmas_pemberi_var1')->nullable();
            $table->date('tanggal_pemberian_var2')->nullable();
            $table->unsignedBigInteger('puskesmas_pemberi_var2')->nullable();
            $table->date('tanggal_pemberian_var3')->nullable();
            $table->unsignedBigInteger('puskesmas_pemberi_var3')->nullable();
            $table->date('tanggal_pemberian_var4')->nullable();
            $table->unsignedBigInteger('puskesmas_pemberi_var4')->nullable();
            $table->string('status_imunisasi');
            
            $table->foreign('puskesmas_pemberi_var1')->references('id')->on('instansis');
            $table->foreign('puskesmas_pemberi_var2')->references('id')->on('instansis');
            $table->foreign('puskesmas_pemberi_var3')->references('id')->on('instansis');
            $table->foreign('puskesmas_pemberi_var4')->references('id')->on('instansis');

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
        Schema::dropIfExists('imunisasis');
    }
};
