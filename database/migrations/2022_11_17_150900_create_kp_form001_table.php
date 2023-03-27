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
        Schema::create('kp_form001', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nama')->nullable();
            $table->string('perusahaan1')->nullable();
            $table->string('alamat_perusahaan1')->nullable();
            $table->string('bidang_perusahaan1')->nullable();
            $table->string('perusahaan2')->nullable();
            $table->string('alamat_perusahaan2')->nullable();
            $table->string('bidang_perusahaan2')->nullable();
            $table->string('status')->nullable();
            $table->string('pdf_form001')->nullable();
            $table->string('surat')->nullable();
            $table->timestamps();
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kp_form001');
    }
};
