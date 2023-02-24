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
        Schema::create('seminar', function (Blueprint $table) {
            $table->id();
            $table->string('id_seminar')->unique();
            $table->string('id_ta');
            $table->string('judul')->nullable();
            $table->string('jurnal')->nullable();
            $table->string('draft')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('jam_seminar')->nullable();
            $table->string('tanggal_seminar')->nullable();
            $table->string('status')->nullable();
            $table->longtext('komentar1')->nullable();
            $table->longtext('komentar2')->nullable();
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
        Schema::dropIfExists('seminar');
    }
};
