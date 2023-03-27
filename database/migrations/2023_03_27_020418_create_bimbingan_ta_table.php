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
        Schema::create('bimbingan_ta', function (Blueprint $table) {
            $table->id();
            $table->string('id_bta');
            $table->string('id_ta');
            $table->string('tanggal_bimbingan')->nullable();
            $table->string('kegiatan')->nullable();
            // $table->string('id_ta')->nullable();
            $table->string('status_p1')->nullable();
            $table->string('status_p2')->nullable();
            $table->timestamps();
            $table->foreign('id_ta')->references('id_ta')->on('ta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bimbingan_ta');
    }
};
