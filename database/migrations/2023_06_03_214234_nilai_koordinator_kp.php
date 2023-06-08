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
            $table->string('username');
            $table->string('name');
            $table->string('sidang_penguji');
            $table->string('sidang_pembimbing')->nullable();
            $table->timestamps();
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
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
