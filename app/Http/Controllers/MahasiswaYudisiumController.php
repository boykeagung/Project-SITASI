<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use App\Models\Yudisium;
use App\Models\Mahasiswa;

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
                'toga' => 'xs'
            );
            Yudisium::create($userData);
        }

        $join = DB::table('users')
            ->join('mahasiswa', 'users.username', '=', 'mahasiswa.nrp')
            ->join('yudisium', 'users.username', '=', 'yudisium.nrp')
            ->where('users.username', $loggedNrp)
            ->get();
        return view('mahasiswa.dashboard-mahasiswa-yudisium', ['collection' => $join]);

    }

    public function updateMahasiswa(Request $req)
    {
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
            'toga' => $toga
        ]);

        return redirect(URL::to('/dashboard-mahasiswa-yudisium'));
    }

    public function updatePersyaratan(Request $req)
    {

        $nrp = $req->input('inputNrp');
        $path_to_upload = public_path("Yudisium/$nrp/");
        File::ensureDirectoryExists($path_to_upload);


        if ($req->hasFile('inputPasFoto')) {
            $file = $req->file('inputPasFoto');
            $fileName = 'pas_foto_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['pas_foto' => $fileName]);
        }
        if ($req->hasFile('inputAktaKelahiran')) {
            $file = $req->file('inputAktaKelahiran');
            $fileName = 'akta_kelahiran_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['akta_kelahiran' => $fileName]);
        }
        if ($req->hasFile('inputIjasahSekolahMenengah')) {
            $file = $req->file('inputIjasahSekolahMenengah');
            $fileName = 'ijasah_sekolah_menengah_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['ijasah_sekolah_menengah' => $fileName]);
        }
        if ($req->hasFile('inputJudulTugasAkhirIndonesia')) {
            $file = $req->file('inputJudulTugasAkhirIndonesia');
            $fileName = 'judul_ta_id_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['judul_ta_id' => $fileName]);
        }
        if ($req->hasFile('inputJudulTugasAkhirInggris')) {
            $file = $req->file('inputJudulTugasAkhirInggris');
            $fileName = 'judul_ta_en_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['judul_ta_en' => $fileName]);
        }
        if ($req->hasFile('inputBebasPinjamBuku')) {
            $file = $req->file('inputBebasPinjamBuku');
            $fileName = 'bebas_pinjam_buku_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['bebas_pinjam_buku' => $fileName]);
        }
        if ($req->hasFile('inputTranskripDariSikad')) {
            $file = $req->file('inputTranskripDariSikad');
            $fileName = 'transkrip_dari_sikad_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['transkrip_dari_sikad' => $fileName]);
        }
        if ($req->hasFile('inputResumeSkkDanSimskk')) {
            $file = $req->file('inputResumeSkkDanSimskk');
            $fileName = 'resume_skk_dan_simskk_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['resume_skk_dan_simskk' => $fileName]);
        }
        if ($req->hasFile('inputHasilTestEpt')) {
            $file = $req->file('inputHasilTestEpt');
            $fileName = 'hasil_test_ept_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['hasil_test_ept' => $fileName]);
        }
        if ($req->hasFile('inputBuktiPembayaran')) {
            $file = $req->file('inputBuktiPembayaran');
            $fileName = 'bukti_pembayaran_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['bukti_pembayaran' => $fileName]);
        }
        if ($req->hasFile('inputSuratGantiNama')) {
            $file = $req->file('inputSuratGantiNama');
            $fileName = 'surat_ganti_nama_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['surat_ganti_nama' => $fileName]);
        }
        if ($req->hasFile('inputFormBiodataPesertaYudisium')) {
            $file = $req->file('inputFormBiodataPesertaYudisium');
            $fileName = 'form_biodata_peserta_yudisium_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['form_biodata_peserta_yudisium' => $fileName]);
        }
        if ($req->hasFile('inputSertifikatKeahlian')) {
            $file = $req->file('inputSertifikatKeahlian');
            $fileName = 'sertifikat_keahlian_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['sertifikat_keahlian' => $fileName]);
        }
        if ($req->hasFile('inputPoseterA3')) {
            $file = $req->file('inputPoseterA3');
            $fileName = 'poster_a3_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['poster_a3' => $fileName]);
        }
        if ($req->hasFile('inputBukuTugasAkhirSah')) {
            $file = $req->file('inputBukuTugasAkhirSah');
            $fileName = 'buku_tugas_akhir_sah_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['buku_tugas_akhir_sah' => $fileName]);
        }
        if ($req->hasFile('inputJurnalPenelitian')) {
            $file = $req->file('inputJurnalPenelitian');
            $fileName = 'jurnal_penelitian_' . $nrp . '.' . $file->getClientOriginalExtension();
            $file->move($path_to_upload, $fileName);
            Yudisium::where('nrp', $nrp)->update(['jurnal_penelitian' => $fileName]);
        }
        return redirect(URL::to('/dashboard-mahasiswa-yudisium'));
    }

    public function resetPersyaratan($nrp, $persyaratan)
    {
        $path_to_delete = public_path("Yudisium/$nrp/");
        if ($nrp == Auth::user()->username) {
            if ($persyaratan == "pas_foto") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->pas_foto;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "akta_kelahiran") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->akta_kelahiran;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "ijasah_sekolah_menengah") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->ijasah_sekolah_menengah;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "judul_ta_id") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->judul_ta_id;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "judul_ta_en") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->judul_ta_en;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "bebas_pinjam_buku") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->bebas_pinjam_buku;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "transkrip_dari_sikad") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->transkrip_dari_sikad;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "resume_skk_dan_simskk") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->resume_skk_dan_simskk;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "hasil_test_ept") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->hasil_test_ept;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "bukti_pembayaran") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->bukti_pembayaran;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "surat_ganti_nama") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->surat_ganti_nama;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "form_biodata_peserta_yudisium") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->form_biodata_peserta_yudisium;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "sertifikat_keahlian") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->sertifikat_keahlian;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "poster_a3") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->poster_a3;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "buku_tugas_akhir_sah") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->buku_tugas_akhir_sah;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            } else if ($persyaratan == "jurnal_penelitian") {
                $file_to_delete = Yudisium::where('nrp', $nrp)->first()->jurnal_penelitian;
                Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
                File::delete($path_to_delete . $file_to_delete);
            }
            return redirect(URL::to('/dashboard-mahasiswa-yudisium'));
        } else {
            return redirect(URL::to('/'));
        }
    }
    public function cekYudisium()
    {
        return view('mahasiswa.dashboard-mahasiswa-cek-yudisium');
    }
}