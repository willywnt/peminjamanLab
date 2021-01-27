<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('ruangan');
            $table->string('id_komputer');
            $table->string('tanggal');
            $table->string('hari');
            $table->string('jam');
            $table->string('sesi');
            $table->string('keperluan');
            $table->foreignId('status_id');
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('status_peminjaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_pengajuan');
    }
}
