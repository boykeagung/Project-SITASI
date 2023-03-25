<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Authentication
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string $username
 * @property string|null $username_verified_at
 * @property string $password
 * @property string $level
 * @property string|null $foto
 * @property string|null $alamat
 * @property string|null $no_hp
 * @property string|null $no_wa
 * @property string|null $ipk
 * @property int|null $sks
 * @property string|null $status_dosen
 * @property string|null $jabatan_akademik
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication query()
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereIpk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereJabatanAkademik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereNoWa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereSks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereStatusDosen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereUsernameVerifiedAt($value)
 */
	class Authentication extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Dosen
 *
 * @property int $id
 * @property string $nip
 * @property string $nama_lengkap
 * @property string|null $foto
 * @property string|null $email
 * @property string|null $alamat
 * @property string|null $no_hp
 * @property string|null $no_wa
 * @property string|null $status_dosen
 * @property string|null $jabatan_akademik
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereJabatanAkademik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereNoWa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereStatusDosen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dosen whereUpdatedAt($value)
 */
	class Dosen extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Form001
 *
 * @property int $id
 * @property string $username
 * @property string|null $nama
 * @property string|null $perusahaan1
 * @property string|null $alamat_perusahaan1
 * @property string|null $bidang_perusahaan1
 * @property string|null $perusahaan2
 * @property string|null $alamat_perusahaan2
 * @property string|null $bidang_perusahaan2
 * @property string|null $pdf_form001
 * @property string|null $surat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereAlamatPerusahaan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereAlamatPerusahaan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereBidangPerusahaan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereBidangPerusahaan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 wherePdfForm001($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 wherePerusahaan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 wherePerusahaan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form001 whereUsername($value)
 */
	class Form001 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KP
 *
 * @property int $id
 * @property string $id_kp
 * @property string $username
 * @property string|null $pembimbing_kp
 * @property string|null $perusahaan
 * @property string|null $alamat_perusahaan
 * @property string|null $bidang_perusahaan
 * @property string|null $pembimbing_perusahaan
 * @property string|null $mulai_kp
 * @property string|null $selesai_kp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|KP newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KP newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KP query()
 * @method static \Illuminate\Database\Eloquent\Builder|KP whereAlamatPerusahaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP whereBidangPerusahaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP whereIdKp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP whereMulaiKp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP wherePembimbingKp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP wherePembimbingPerusahaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP wherePerusahaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP whereSelesaiKp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KP whereUsername($value)
 */
	class KP extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mahasiswa
 *
 * @property int $id
 * @property string $nrp
 * @property string $nama_lengkap
 * @property string $password
 * @property string $level
 * @property string|null $tanggal_lahir
 * @property string|null $foto
 * @property string|null $email
 * @property string|null $alamat
 * @property string|null $no_hp
 * @property string|null $no_wa
 * @property string|null $ipk
 * @property int|null $sks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereIpk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNoWa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNrp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereSks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereUpdatedAt($value)
 */
	class Mahasiswa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mahasiswa_Sidang_TA
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa_Sidang_TA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa_Sidang_TA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa_Sidang_TA query()
 */
	class Mahasiswa_Sidang_TA extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Proposal
 *
 * @property int $id
 * @property string $id_proposal
 * @property string $id_ta
 * @property string|null $judul
 * @property string|null $proposal
 * @property string|null $ruangan
 * @property string|null $jam_sidang
 * @property string|null $tanggal_sidang
 * @property string|null $status
 * @property string|null $komentar1
 * @property string|null $komentar2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereIdProposal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereIdTa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereJamSidang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereKomentar1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereKomentar2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereProposal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereRuangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereTanggalSidang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereUpdatedAt($value)
 */
	class Proposal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Seminar
 *
 * @property int $id
 * @property string $id_seminar
 * @property string $id_ta
 * @property string|null $judul
 * @property string|null $jurnal
 * @property string|null $draft
 * @property string|null $ruangan
 * @property string|null $jam_seminar
 * @property string|null $tanggal_seminar
 * @property string|null $status
 * @property string|null $komentar1
 * @property string|null $komentar2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereIdSeminar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereIdTa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereJamSeminar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereJurnal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereKomentar1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereKomentar2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereRuangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereTanggalSeminar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seminar whereUpdatedAt($value)
 */
	class Seminar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TA
 *
 * @property int $id
 * @property string $id_ta
 * @property string $username
 * @property string|null $pembimbing1
 * @property string|null $pembimbing2
 * @property string|null $penguji1
 * @property string|null $penguji2
 * @property string|null $draft
 * @property string|null $judul
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TA query()
 * @method static \Illuminate\Database\Eloquent\Builder|TA whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA whereDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA whereIdTa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA wherePembimbing1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA wherePembimbing2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA wherePenguji1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA wherePenguji2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TA whereUsername($value)
 */
	class TA extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string $username
 * @property string|null $username_verified_at
 * @property string $password
 * @property string $level
 * @property string|null $foto
 * @property string|null $alamat
 * @property string|null $no_hp
 * @property string|null $no_wa
 * @property string|null $ipk
 * @property int|null $sks
 * @property string|null $status_dosen
 * @property string|null $jabatan_akademik
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIpk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJabatanAkademik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoWa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatusDosen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsernameVerifiedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Yudisium
 *
 * @property int $id
 * @property string $nrp
 * @property string $toga
 * @property mixed|null $pas_foto
 * @property mixed|null $akta_kelahiran
 * @property mixed|null $ijasah_sekolah_menengah
 * @property mixed|null $judul_ta_id
 * @property mixed|null $judul_ta_en
 * @property mixed|null $bebas_pinjam_buku
 * @property mixed|null $transkrip_dari_sikad
 * @property mixed|null $resume_skk_dan_simskk
 * @property mixed|null $hasil_test_ept
 * @property mixed|null $bukti_pembayaran
 * @property mixed|null $surat_ganti_nama
 * @property mixed|null $form_biodata_peserta_yudisium
 * @property mixed|null $sertifikat_keahlian
 * @property mixed|null $poster_a3
 * @property mixed|null $buku_tugas_akhir_sah
 * @property mixed|null $jurnal_penelitian
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium query()
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereAktaKelahiran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereBebasPinjamBuku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereBuktiPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereBukuTugasAkhirSah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereFormBiodataPesertaYudisium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereHasilTestEpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereIjasahSekolahMenengah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereJudulTaEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereJudulTaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereJurnalPenelitian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereNrp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium wherePasFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium wherePosterA3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereResumeSkkDanSimskk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereSertifikatKeahlian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereSuratGantiNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereToga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yudisium whereTranskripDariSikad($value)
 */
	class Yudisium extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\sidang_kp
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $id_sidang_kp
 * @property string $id_kp
 * @property string|null $penguji1
 * @property string|null $penguji2
 * @property string|null $laporan
 * @property string|null $ruangan
 * @property string|null $jam_sidang
 * @property string|null $tanggal_sidang
 * @property string|null $status
 * @property string|null $nilai
 * @property string|null $komentar1
 * @property string|null $komentar2
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp query()
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereIdKp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereIdSidangKp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereJamSidang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereKomentar1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereKomentar2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereLaporan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp wherePenguji1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp wherePenguji2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereRuangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereTanggalSidang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sidang_kp whereUpdatedAt($value)
 */
	class sidang_kp extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\testForm001
 *
 * @method static \Illuminate\Database\Eloquent\Builder|testForm001 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|testForm001 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|testForm001 query()
 */
	class testForm001 extends \Eloquent {}
}

