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
        Schema::create('ta', function (Blueprint $table) {
            $table->id();
            $table->string('id_ta')->unique();
            // $table->id('id_ta');
            $table->string('username');
            $table->string('pembimbing1')->nullable();
            $table->string('pembimbing2')->nullable();
            $table->string('penguji1')->nullable();
            $table->string('penguji2')->nullable();
            $table->string('draft')->nullable();
            $table->string('judul')->nullable();
            $table->timestamps();
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            // $table->foreign('pembimbing1')->references('username')->on('users')->onDelete('cascade');
            // $table->foreign('pembimbing2')->references('username')->on('users')->onDelete('cascade');
            // $table->foreign('penguji1')->references('username')->on('users')->onDelete('cascade');
            // $table->foreign('penguji2')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ta');
    }
};
