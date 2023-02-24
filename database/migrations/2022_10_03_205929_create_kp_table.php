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
        Schema::create('kp', function (Blueprint $table) {
            $table->id();
            $table->string('id_kp')->unique();
            $table->string('username');
            $table->string('pembimbing_kp')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('bidang_perusahaan')->nullable();
            $table->string('pembimbing_perusahaan')->nullable();
            $table->string('mulai_kp')->nullable();
            $table->string('selesai_kp')->nullable();
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
        Schema::dropIfExists('kp');
    }
};
