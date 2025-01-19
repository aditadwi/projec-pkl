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
        // Membuat tabel 'almarhums'
        Schema::create('almarhums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelapor_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Bisa kosong
            $table->string('namaalmarhum'); // Nama almarhum
            $table->string('tempat_tanggal_lahir'); // Tempat dan tanggal lahir
            $table->string('tempat_tanggal_meninggal'); // Tempat dan tanggal meninggal
            $table->string('nama_tempat_pemakaman'); // Nama tempat pemakaman
            $table->string('nik')->unique(); // NIK almarhum
            $table->string('nama_keluarga'); // Nama keluarga yang melaporkan
            $table->string('nohp_keluarga'); // Nomor HP keluarga yang melaporkan
            $table->timestamps();
        });

        // Menambahkan foreign key
        Schema::table('almarhums', function (Blueprint $table) {
            $table->foreign('pelapor_id')->references('id')->on('pelapors')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus foreign key
        Schema::table('almarhums', function (Blueprint $table) {
            $table->dropForeign(['pelapor_id']);
            $table->dropForeign(['user_id']);
        });

        // Menghapus tabel
        Schema::dropIfExists('almarhums');
    }
};
