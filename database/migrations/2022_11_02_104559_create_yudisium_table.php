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
        });

        DB::statement('ALTER TABLE yudisium ADD pas_foto MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD akta_kelahiran MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD ijasah_sekolah_menengah MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD judul_ta_id MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD judul_ta_en MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD bebas_pinjam_buku MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD transkrip_dari_sikad MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD resume_skk_dan_simskk MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD hasil_test_ept MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD bukti_pembayaran MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD surat_ganti_nama MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD form_biodata_peserta_yudisium MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD sertifikat_keahlian MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD poster_a3 MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD buku_tugas_akhir_sah MEDIUMBLOB');
        DB::statement('ALTER TABLE yudisium ADD jurnal_penelitian MEDIUMBLOB');
    }
    public function down()
    {
        Schema::dropIfExists('yudisium');
    }
};
