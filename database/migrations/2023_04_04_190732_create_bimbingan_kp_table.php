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
        Schema::create('bimbingan_kp', function (Blueprint $table) {
            $table->id();
            $table->string('id_bkp');
            $table->string('id_kp');
            $table->string('tanggal_bimbingan')->nullable();
            $table->longText('kegiatan')->nullable();
            // $table->string('id_ta')->nullable();
            $table->string('status_p1')->nullable();
            // $table->string('status_p2')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('bimbingan_kp');
    }
};
