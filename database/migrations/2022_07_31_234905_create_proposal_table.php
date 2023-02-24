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
        Schema::create('proposal', function (Blueprint $table) {
            $table->id();
            $table->string('id_proposal')->unique();
            // $table->id('id_proposal');
            $table->string('id_ta');
            $table->string('judul')->nullable();
            $table->string('proposal')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('jam_sidang')->nullable();
            $table->string('tanggal_sidang')->nullable();
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
        Schema::dropIfExists('proposal');
    }
};
