<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanamanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanaman_detail', function (Blueprint $table) {
            $table->id('id_tanaman');
            $table->string('nama_tanaman_indonesia');
            $table->string('nama_tanaman_latin');
            $table->text('keterangan')->nullable();
            $table->text('manfaat')->nullable();
            $table->string('gambar')->nullable();
            $table->string('qrcode')->nullable();
            $table->unsignedBigInteger('id_kategori'); // Foreign key
            $table->foreign('id_kategori')->references('id_kategori')->on('tanaman_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanaman_detail');
    }
}
