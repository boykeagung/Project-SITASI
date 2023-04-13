<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use App\Models\Yudisium;
use App\Models\Mahasiswa;
use App\Models\Notifikasi;

class MahasiswaYudisiumController extends Controller
{

    public function index()
    {
        $loggedNrp = Auth::user()->username;

        if (Mahasiswa::where('nrp', '=', $loggedNrp)->doesntExist()) {
            $userData = array(
                'nrp' => $loggedNrp,
                'nama_lengkap' => Auth::user()->name,
                'tanggal_lahir' => null,
                'password' => Auth::user()->password,
                'foto' => Auth::user()->foto,
                'email' => Auth::user()->email,
                'alamat' => Auth::user()->alamat,
                'no_hp' => Auth::user()->no_hp,
                'no_wa' => Auth::user()->no_wa,
                'ipk' => Auth::user()->ipk,
                'sks' => Auth::user()->sks,
                'level' => Auth::user()->level
            );
            Mahasiswa::create($userData);
        }
        if (Yudisium::where('nrp', '=', $loggedNrp)->doesntExist()) {
            $userData = array(
                'nrp' => $loggedNrp,
                'toga' => 'xs',
                'status_yudisium' => 'Mengisi'
            );
            Yudisium::create($userData);
        }

        $join = DB::table('users')
            ->join('mahasiswa', 'users.username', '=', 'mahasiswa.nrp')
            ->join('yudisium', 'users.username', '=', 'yudisium.nrp')
            ->where('users.username', $loggedNrp)
            ->get();

        $detailAjuan = DB::table('notifikasi')
            ->where('notifikasi_own', '=', Auth::user()->username)
            ->where('notifikasi_context', '=', 'Yudisium')
            ->get();
        return view('mahasiswa.dashboard-mahasiswa-yudisium', ['collection' => $join, 'detailAjuan' => $detailAjuan]);

    }
    public function updateMahasiswa(Request $req)
    {
        $rules = [
            'inputNrp' => 'required',
            'inputNama' => 'required',
            'inputTanggalLahir' => 'required|before:today',
            'inputAlamat' => 'required',
            'inputEmail' => 'required|email',
            'inputTelepon' => 'required|max:15',
            'inputIPK' => 'required|numeric|min:0|max:4',
            'inputSKS' => 'required|numeric|min:144',
            'inputToga' => 'required',
        ];
        $messages = [
            'inputNrp' => 'Cek kembali form ini.',
            'inputNama' => 'Cek kembali form ini.',
            'inputTanggalLahir' => 'Cek kembali form ini.',
            'inputAlamat' => 'Cek kembali form ini.',
            'inputEmail' => 'Cek kembali form ini.',
            'inputTelepon' => 'Cek kembali form ini.',
            'inputIPK' => 'Cek kembali form ini.',
            'inputSKS' => 'Cek kembali form ini.',
            'inputToga' => 'Cek kembali form ini.',
        ];
        $validator = Validator::make($req->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $nrp = $req->input('inputNrp');
            $nama = $req->input('inputNama');
            $tanggal_lahir = $req->input('inputTanggalLahir');
            $alamat = $req->input('inputAlamat');
            $email = $req->input('inputEmail');
            $telepon = $req->input('inputTelepon');
            $ipk = $req->input('inputIPK');
            $sks = $req->input('inputSKS');
            $toga = $req->input('inputToga');

            Mahasiswa::where('nrp', $nrp)->update([
                'nrp' => $nrp,
                'nama_lengkap' => $nama,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'email' => $email,
                'no_hp' => $telepon,
                'no_wa' => $telepon,
                'ipk' => $ipk,
                'sks' => $sks,
            ]);

            Yudisium::where('nrp', $nrp)->update([
                'toga' => $toga,
                'tanggal_modifikasi_mahasiswa' => now()
            ]);
            return redirect(URL::to('/dashboard-mahasiswa-yudisium'));
        }
    }

    public function updatePersyaratan(Request $req)
    {

        $nrp = $req->input('inputNrp');
        $path_to_upload = public_path("Yudisium/$nrp/");
        File::ensureDirectoryExists($path_to_upload);

        $rules = [
            'inputPasFoto' => 'file|mimes:png,jpg,jpeg|max:4024',
            'inputAktaKelahiran' => 'file|mimes:pdf|max:4024',
            'inputIjasahSekolahMenengah' => 'file|mimes:pdf|max:4024',
            'inputJudulTugasAkhirIndonesia' => 'file|mimes:pdf|max:4024',
            'inputJudulTugasAkhirInggris' => 'file|mimes:pdf|max:4024',
            'inputBebasPinjamBuku' => 'file|mimes:pdf|max:4024',
            'inputTranskripDariSikad' => 'file|mimes:pdf|max:4024',
            'inputResumeSkkDanSimskk' => 'file|mimes:pdf|max:4024',
            'inputHasilTestEpt' => 'file|mimes:pdf|max:4024',
            'inputBuktiPembayaran' => 'file|mimes:pdf|max:4024',
            'inputSuratGantiNama' => 'file|mimes:pdf|max:4024',
            'inputFormBiodataPesertaYudisium' => 'file|mimes:pdf|max:4024',
            'inputSertifikatKeahlian' => 'file|mimes:pdf,rar,|max:4024',
            'inputPoseterA3' => 'file|mimes:pdf|max:4024',
            'inputBukuTugasAkhirSah' => 'file|mimes:pdf|max:4024',
            'inputJurnalPenelitian' => 'file|mimes:pdf|max:4024',
        ];
        $messages = [
            'inputPasFoto.mimes' => 'Ekstensi file bukan png, jpg, jpeg.',
            'inputAktaKelahiran.mimes' => 'Ekstensi file bukan pdf.',
            'inputIjasahSekolahMenengah.mimes' => 'Ekstensi file bukan pdf.',
            'inputJudulTugasAkhirIndonesia.mimes' => 'Ekstensi file bukan pdf.',
            'inputJudulTugasAkhirInggris.mimes' => 'Ekstensi file bukan pdf.',
            'inputBebasPinjamBuku.mimes' => 'Ekstensi file bukan pdf.',
            'inputTranskripDariSikad.mimes' => 'Ekstensi file bukan pdf.',
            'inputResumeSkkDanSimskk.mimes' => 'Ekstensi file bukan pdf.',
            'inputHasilTestEpt.mimes' => 'Ekstensi file bukan pdf.',
            'inputBuktiPembayaran.mimes' => 'Ekstensi file bukan pdf.',
            'inputSuratGantiNama.mimes' => 'Ekstensi file bukan pdf.',
            'inputFormBiodataPesertaYudisium.mimes' => 'Ekstensi file bukan pdf.',
            'inputSertifikatKeahlian.mimes' => 'Ekstensi file bukan pdf,rar,zip.',
            'inputPoseterA3.mimes' => 'Ekstensi file bukan pdf.',
            'inputBukuTugasAkhirSah.mimes' => 'Ekstensi file bukan pdf.',
            'inputJurnalPenelitian.mimes' => 'Ekstensi file bukan pdf.',
            'inputPasFoto.size' => 'File size terlalu besar',
            'inputAktaKelahiran.size' => 'File size terlalu besar',
            'inputIjasahSekolahMenengah.size' => 'File size terlalu besar',
            'inputJudulTugasAkhirIndonesia.size' => 'File size terlalu besar',
            'inputJudulTugasAkhirInggris.size' => 'File size terlalu besar',
            'inputBebasPinjamBuku.size' => 'File size terlalu besar',
            'inputTranskripDariSikad.size' => 'File size terlalu besar',
            'inputResumeSkkDanSimskk.size' => 'File size terlalu besar',
            'inputHasilTestEpt.size' => 'File size terlalu besar',
            'inputBuktiPembayaran.size' => 'File size terlalu besar',
            'inputSuratGantiNama.size' => 'File size terlalu besar',
            'inputFormBiodataPesertaYudisium.size' => 'File size terlalu besar',
            'inputSertifikatKeahlian.size' => 'File size terlalu besar',
            'inputPoseterA3.size' => 'File size terlalu besar',
            'inputBukuTugasAkhirSah.size' => 'File size terlalu besar',
            'inputJurnalPenelitian.size' => 'File size terlalu besar'
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($req->hasFile('inputPasFoto')) {
                $file = $req->file('inputPasFoto');
                $fileName = 'pas_foto_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['pas_foto' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputAktaKelahiran')) {
                $file = $req->file('inputAktaKelahiran');
                $fileName = 'akta_kelahiran_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['akta_kelahiran' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputIjasahSekolahMenengah')) {
                $file = $req->file('inputIjasahSekolahMenengah');
                $fileName = 'ijasah_sekolah_menengah_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['ijasah_sekolah_menengah' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputJudulTugasAkhirIndonesia')) {
                $file = $req->file('inputJudulTugasAkhirIndonesia');
                $fileName = 'judul_ta_id_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['judul_ta_id' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputJudulTugasAkhirInggris')) {
                $file = $req->file('inputJudulTugasAkhirInggris');
                $fileName = 'judul_ta_en_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['judul_ta_en' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputBebasPinjamBuku')) {
                $file = $req->file('inputBebasPinjamBuku');
                $fileName = 'bebas_pinjam_buku_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['bebas_pinjam_buku' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputTranskripDariSikad')) {
                $file = $req->file('inputTranskripDariSikad');
                $fileName = 'transkrip_dari_sikad_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['transkrip_dari_sikad' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputResumeSkkDanSimskk')) {
                $file = $req->file('inputResumeSkkDanSimskk');
                $fileName = 'resume_skk_dan_simskk_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['resume_skk_dan_simskk' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputHasilTestEpt')) {
                $file = $req->file('inputHasilTestEpt');
                $fileName = 'hasil_test_ept_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['hasil_test_ept' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputBuktiPembayaran')) {
                $file = $req->file('inputBuktiPembayaran');
                $fileName = 'bukti_pembayaran_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['bukti_pembayaran' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputSuratGantiNama')) {
                $file = $req->file('inputSuratGantiNama');
                $fileName = 'surat_ganti_nama_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['surat_ganti_nama' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputFormBiodataPesertaYudisium')) {
                $file = $req->file('inputFormBiodataPesertaYudisium');
                $fileName = 'form_biodata_peserta_yudisium_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['form_biodata_peserta_yudisium' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputSertifikatKeahlian')) {
                $file = $req->file('inputSertifikatKeahlian');
                $fileName = 'sertifikat_keahlian_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['sertifikat_keahlian' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputPoseterA3')) {
                $file = $req->file('inputPoseterA3');
                $fileName = 'poster_a3_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['poster_a3' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputBukuTugasAkhirSah')) {
                $file = $req->file('inputBukuTugasAkhirSah');
                $fileName = 'buku_tugas_akhir_sah_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['buku_tugas_akhir_sah' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            if ($req->hasFile('inputJurnalPenelitian')) {
                $file = $req->file('inputJurnalPenelitian');
                $fileName = 'jurnal_penelitian_' . $nrp . '.' . $file->getClientOriginalExtension();
                $file->move($path_to_upload, $fileName);
                Yudisium::where('nrp', $nrp)->update(['jurnal_penelitian' => $fileName, 'tanggal_modifikasi_mahasiswa' => now()]);
            }
            return redirect(URL::to('/dashboard-mahasiswa-yudisium'));
        }

    }

    public function resetPersyaratan($nrp, $persyaratan)
    {
        $path_to_delete = public_path("Yudisium/$nrp/");
        if ($nrp == Auth::user()->username) {
            if ($persyaratan == "pas_foto") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->pas_foto;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "akta_kelahiran") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->akta_kelahiran;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "ijasah_sekolah_menengah") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->ijasah_sekolah_menengah;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "judul_ta_id") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->judul_ta_id;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "judul_ta_en") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->judul_ta_en;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "bebas_pinjam_buku") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->bebas_pinjam_buku;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "transkrip_dari_sikad") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->transkrip_dari_sikad;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "resume_skk_dan_simskk") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->resume_skk_dan_simskk;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "hasil_test_ept") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->hasil_test_ept;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "bukti_pembayaran") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->bukti_pembayaran;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "surat_ganti_nama") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->surat_ganti_nama;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "form_biodata_peserta_yudisium") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->form_biodata_peserta_yudisium;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "sertifikat_keahlian") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->sertifikat_keahlian;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "poster_a3") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->poster_a3;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "buku_tugas_akhir_sah") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->buku_tugas_akhir_sah;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "jurnal_penelitian") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->jurnal_penelitian;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null, 'tanggal_modifikasi_mahasiswa' => now()]);
                File::delete($path_to_delete . $file_to_delete);
            }
            return redirect(URL::to('/dashboard-mahasiswa-yudisium'));
        } else {
            return redirect(URL::to('/'));
        }
    }
    public function konfirmasiPersyaratan($nrp)
    {
        if ($nrp == Auth::user()->username) {
            $checkInfoMahasiswa = Mahasiswa::where('nrp', $nrp)
                ->whereNotNull('nrp')
                ->whereNotNull('nama_lengkap')
                ->whereNotNull('tanggal_lahir')
                ->whereNotNull('password')
                ->whereNotNull('email')
                ->whereNotNull('alamat')
                ->whereNotNull('no_wa')
                ->whereNotNull('ipk')
                ->whereNotNull('sks')
                ->whereNotNull('level')
                ->get();
            $checkBerkas = Yudisium::where('nrp', $nrp)
                ->whereNotNull('pas_foto')
                ->whereNotNull('akta_kelahiran')
                ->whereNotNull('ijasah_sekolah_menengah')
                ->whereNotNull('judul_ta_id')
                ->whereNotNull('judul_ta_en')
                ->whereNotNull('bebas_pinjam_buku')
                ->whereNotNull('transkrip_dari_sikad')
                ->whereNotNull('resume_skk_dan_simskk')
                ->whereNotNull('hasil_test_ept')
                ->whereNotNull('form_biodata_peserta_yudisium')
                ->whereNotNull('poster_a3')
                ->whereNotNull('buku_tugas_akhir_sah')
                ->whereNotNull('jurnal_penelitian')
                ->get();
            if (!$checkInfoMahasiswa->isEmpty() && !$checkBerkas->isEmpty()) {
                // mhs mengajukan
                Yudisium::where('nrp', $nrp)->update(['status_yudisium' => 'Diajukan', 'tanggal_modifikasi_mahasiswa' => now()]);
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_own' => $nrp,
                            'notifikasi_icon' => 'fas fa-paper-plane',
                            'notifikasi_color' => 'warning',
                            'notifikasi_message' => 'Pengajuan yudisium Anda telah diajukan, tunggu proses verifikasi dokumen oleh tata usaha kami',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-inbox',
                            'notifikasi_color' => 'warning',
                            'notifikasi_message' => 'Mahasiswa ' . $nrp . ' menyerahkan formulir pendaftaran Yudisium untuk diverifikasi',
                            'notifikasi_link' => 'dashboard-tata-usaha-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ]
                    )
                );
                return redirect()->back();
            } else {
                return redirect()->back()->with('message', 'Data diri atau berkas persyaratan yang belum
            anda lengkapi.');
            }
        } else {
            return redirect()->back();
        }
    }

    public function tarikAjuan($nrp)
    {
        if ($nrp == Auth::user()->username) {
            Yudisium::where('nrp', $nrp)->update(['status_yudisium' => 'Mengisi', 'tanggal_modifikasi_mahasiswa' => now()]);
            Notifikasi::insert(
                array(
                    [
                        'notifikasi_own' => $nrp,
                        'notifikasi_icon' => 'fas fa-user-edit',
                        'notifikasi_color' => 'warning',
                        'notifikasi_message' => 'Anda menarik formulir pendaftaran yudisium untuk dikoreksi',
                        'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                        'notifikasi_time' => now(),
                        'notifikasi_context' => 'Yudisium',
                        'notifikasi_read' => 0
                    ],
                    [
                        'notifikasi_own' => config('global.id_tu'),
                        'notifikasi_icon' => 'fas fa-user-edit',
                        'notifikasi_color' => 'warning',
                        'notifikasi_message' => 'Mahasiswa ' . $nrp . ' menarik formulir pendaftaran yudisium untuk dikoreksi',
                        'notifikasi_link' => 'dashboard-mahasiswa-yudisium/',
                        'notifikasi_time' => now(),
                        'notifikasi_context' => 'Yudisium',
                        'notifikasi_read' => 0
                    ]
                )
            );
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function tentangYudisium()
    {
        $join = DB::table('users')
            ->join('mahasiswa', 'users.username', '=', 'mahasiswa.nrp')
            ->join('yudisium', 'users.username', '=', 'yudisium.nrp')
            ->where('users.username', Auth::user()->username)
            ->get();
        return view('mahasiswa.dashboard-mahasiswa-tentang-yudisium', ['collection' => $join]);
    }
}