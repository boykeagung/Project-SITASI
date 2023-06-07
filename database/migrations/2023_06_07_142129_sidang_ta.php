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
        Schema::create('sidang_ta', function (Blueprint $table) {
            $table->id();
            $table->string('id_sidang_ta')->unique();
            $table->string('id_ta');
            $table->string('judul')->nullable();
            $table->string('buku_ta')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('jam_sidang')->nullable();
            $table->string('jadwal_sidang')->nullable();
            $table->string('status')->nullable();
            $table->string('komentar1')->nullable();
            $table->string('komentar2')->nullable();
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
        Schema::dropIfExists('sidang_ta');
    }
};
