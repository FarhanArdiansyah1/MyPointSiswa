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
        Schema::create('jenis', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->timestamps();
        });
        Schema::create('record_data', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis');
            $table->foreign('id_jenis')->references('id')->on('jenis')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('poin_penghargaan');
            $table->unsignedBigInteger('id_pelanggaran');
            $table->foreign('id_pelanggaran')->references('id')->on('pelanggaran')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_pelapor');
            $table->foreign('id_pelapor')->references('nis_nim_nik')->on('pelapor')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->text('keterangan');
            $table->date('tanggal');
            $table->timestamps();
        });
        Schema::create('record_pelaporan', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis');
            $table->foreign('id_jenis')->references('id')->on('jenis')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('poin_penghargaan');
            $table->unsignedBigInteger('id_pelanggaran');
            $table->foreign('id_pelanggaran')->references('id')->on('pelanggaran')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_pelapor');
            $table->foreign('id_pelapor')->references('nis_nim_nik')->on('pelapor')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->text('keterangan');
            $table->date('tanggal');
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
        Schema::dropIfExists('jenis');
        Schema::dropIfExists('record');
        Schema::dropIfExists('record_pelaporan');
    }
}
