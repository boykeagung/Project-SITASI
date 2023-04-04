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
        Schema::create('nilai_dospem', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name');
            $table->string('kepribadian');
            $table->string('penguasaan_materi')->nullable();
            $table->string('keterampilan')->nullable();
            $table->string('kreatifitas')->nullable();
            $table->string('tanggung_jawab')->nullable();
            $table->string('komunikasi')->nullable();
            $table->string('pdf_nilai')->nullable();
            $table->string('status')->nullable();
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
        //
    }
};
