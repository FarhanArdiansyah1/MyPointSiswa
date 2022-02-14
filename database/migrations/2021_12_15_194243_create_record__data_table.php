<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa')->nullable();
            $table->foreign('id_siswa')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->UnsignedBigInteger('id_pelanggaran')->nullable();
            $table->foreign('id_pelanggaran')->references('id')->on('pelanggaran')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->BigInteger('poin')->nullable();
            $table->unsignedBigInteger('id_pelapor')->nullable();
            $table->foreign('id_pelapor')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->text('keterangan')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_data');
    }
}
