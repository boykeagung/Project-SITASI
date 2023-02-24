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
            $table->string('judul');
            $table->string('buku_ta');
            $table->timestamps();
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
