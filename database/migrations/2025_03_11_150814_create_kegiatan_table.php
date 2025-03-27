<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
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
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('reporter');
            $table->string('isi');
            $table->string('gambar');
            $table->date('tanggal');
            $table->pengunjung();
            $table->timestamps();
        });
    }
}
