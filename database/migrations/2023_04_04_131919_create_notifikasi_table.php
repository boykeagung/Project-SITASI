<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id('notifikasi_id');
            $table->string('notifikasi_milik');
            $table->string('notifikasi_icon');
            $table->string('notifikasi_pesan');
            $table->string('notifikasi_link');
            $table->datetime('notifikasi_waktu');
            $table->string('notifikasi_layanan');
            $table->string('notifikasi_baca');
            $table
                ->foreign('notifikasi_milik')
                ->references('username')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifikasi');
    }
};