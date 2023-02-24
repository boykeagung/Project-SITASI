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
        Schema::create('sidang_kp', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('id_sidang_kp')->unique();
            $table->string('id_kp');
            $table->string('penguji1')->nullable();
            $table->string('penguji2')->nullable();
            $table->string('laporan')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('jam_sidang')->nullable();
            $table->string('tanggal_sidang')->nullable();
            $table->string('status')->nullable();
            $table->string('nilai')->nullable();
            $table->longtext('komentar1')->nullable();
            $table->longtext('komentar2')->nullable();
            $table->foreign('id_kp')->references('id_kp')->on('kp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sidang_kp');
    }
};
