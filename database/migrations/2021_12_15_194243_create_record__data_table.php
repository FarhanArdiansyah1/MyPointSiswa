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
        Schema::create('data_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::create('data_penghargaan', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('poin');
            $table->string('id_pelapor');
            $table->foreign('id_pelapor')->references('nis_nim_nik')->on('pelapor')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->text('keterangan');
            $table->date('tanggal');
            $table->timestamps();
        });
        Schema::create('pelaporan_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::create('pelaporan_penghargaan', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('poin');
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
        Schema::dropIfExists('data_pelanggaran');
        Schema::dropIfExists('data_penghargaan');
        Schema::dropIfExists('pelaporan_pelanggaran');
        Schema::dropIfExists('pelaporan_penghargaan');
    }
}
