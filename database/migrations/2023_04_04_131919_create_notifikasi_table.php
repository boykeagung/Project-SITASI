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
            $table->string('notifikasi_own');
            $table->string('notifikasi_icon');
            $table->string('notifikasi_color');
            $table->string('notifikasi_message');
            $table->string('notifikasi_link');
            $table->datetime('notifikasi_time');
            $table->string('notifikasi_context');
            $table->string('notifikasi_read');
            $table
                ->foreign('notifikasi_own')
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