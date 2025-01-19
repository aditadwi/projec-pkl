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
        Schema::create('pelapors', function (Blueprint $table) {
            $table->id();
            $table->string('namapelapor'); // Nama pelapor
            $table->timestamp('tanggal_pelaporan')->nullable();
            $table->string('nohp'); // Nomor HP
            $table->string('nik')->unique(); // NIK unik
            $table->text('alamat'); // Alamat pelapor
            $table->string('namasaksi1'); // Nama pelapor
            $table->string('namasaksi2'); // Nama pelapor
            $table->string('niksaksi1')->unique(); // NIK unik
            $table->string('niksaksi2')->unique(); // NIK unik
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
        Schema::dropIfExists('pelapors');
    }
};
