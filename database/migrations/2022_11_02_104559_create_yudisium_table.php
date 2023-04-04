<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('yudisium', function (Blueprint $table) {
            $table->id();
            $table->string('nrp')->unique();
            $table
                ->foreign('nrp')
                ->references('username')
                ->on('users');
            $table->string('toga');
            $table->string('status_yudisium')->nullable();
            $table->string('komentar_tu')->nullable();
            $table->string('komentar_koordinator')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('ijasah_sekolah_menengah')->nullable();
            $table->string('judul_ta_id')->nullable();
            $table->string('judul_ta_en')->nullable();
            $table->string('bebas_pinjam_buku')->nullable();
            $table->string('transkrip_dari_sikad')->nullable();
            $table->string('resume_skk_dan_simskk')->nullable();
            $table->string('hasil_test_ept')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('surat_ganti_nama')->nullable();
            $table->string('form_biodata_peserta_yudisium')->nullable();
            $table->string('sertifikat_keahlian')->nullable();
            $table->string('poster_a3')->nullable();
            $table->string('buku_tugas_akhir_sah')->nullable();
            $table->string('jurnal_penelitian')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('yudisium');
    }
};