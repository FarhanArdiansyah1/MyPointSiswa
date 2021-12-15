<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_pelanggaraan', 30);
            $table->string('jarak_point', 30);
            $table->timestamps();
        });
        Schema::create('jenis_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pelanggaran', 30);
            $table->timestamps();
        });
        Schema::create('pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggaran', 100);
            $table->unsignedBigInteger('poin');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategori_pelanggaran')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis');
            $table->foreign('id_jenis')->references('id')->on('jenis_pelanggaran')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('kategori_pelanggaran');
        Schema::dropIfExists('jenis_pelanggaran');
        Schema::dropIfExists('pelanggaran');
    }
}
