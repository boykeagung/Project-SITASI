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
        Schema::create('nilai_koordinator_kp', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();;
            $table->string('name')->nullable();;
            // $table->string('id_nilai_dospem');
            // $table->string('id_nilai_dospem_per');
            $table->string('rataDospem')->nullable();
            $table->string('rataDospemPer')->nullable();
            $table->string('sidang_penguji')->nullable();
            $table->string('sidang_pembimbing')->nullable();
            $table->string('nilai_akhir')->nullable();

            $table->timestamps();
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            // $table->foreign('id_nilai_dospem')->references('id_nilai_dospem')->on('nilai_dospem')->onDelete('cascade');
            // $table->foreign('id_nilai_dospem_per')->references('id_nilai_dospem_per')->on('nilai_dospem_perusahaan')->onDelete('cascade');

            // $table->foreign('rataDospem')->references('rata_rata')->on('nilai_dospem');
            // $table->foreign('rataDospemPer')->references('rata_rata')->on('nilai_dospem_perusahaan');

            // $table->foreign('name')->references('name')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
