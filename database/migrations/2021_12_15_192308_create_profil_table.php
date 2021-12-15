<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kelas', 15);
            $table->timestamps();
        });
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nis', 30);
            $table->string('nama', 100);
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->foreign('id_kelas')->references('id')->on('kelas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_akun')->nullable();
            $table->foreign('id_akun')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['nis']);
        });
        Schema::create('pelapor', function (Blueprint $table) {
            $table->string('nis_nim_nik', 30);
            $table->string('nama', 100);
            $table->string('jabatan', 30);
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->foreign('id_kelas')->references('id')->on('kelas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_akun')->nullable();
            $table->foreign('id_akun')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['nis_nim_nik']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('pelapor');
    }
}
