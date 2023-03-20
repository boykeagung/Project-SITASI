<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Models\Yudisium;
use Illuminate\Http\Request;

class YudisiumController extends Controller
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

          $data['user'] = Yudisium::all();
          $join = DB::table('users')
               ->join('mahasiswa', 'users.username', '=', 'mahasiswa.nrp')
               ->join('yudisium', 'users.username', '=', 'yudisium.nrp')
               ->where('users.username', $loggedNrp)
               ->get();
          return view('mahasiswa.dashboard-mahasiswa-yudisium', ['collection' => $join]);

     }

     public function updateMahasiswa(Request $request)
     {
          $nrp = $request->input('inputNrp');
          $nama = $request->input('inputNama');
          $tanggal_lahir = $request->input('inputTanggalLahir');
          $alamat = $request->input('inputAlamat');
          $email = $request->input('inputEmail');
          $telepon = $request->input('inputTelepon');
          $ipk = $request->input('inputIPK');
          $sks = $request->input('inputSKS');
          $toga = $request->input('inputToga');

          Mahasiswa::where('nrp', $nrp)->update([
               'nrp' => $nrp,
               'nama_lengkap' => $nama,
               'alamat' => $alamat,
               'email' => $email,
               'no_hp' => $telepon,
               'ipk' => $ipk,
               'sks' => $sks,
          ]);

          Yudisium::where('nrp', $nrp)->update([
               'tanggal_lahir' => $tanggal_lahir,
               'toga' => $toga
          ]);

          return redirect(URL::to('/dashboard-mahasiswa-yudisium'));
     }

     public function updatePersyaratan(Request $request)
     {
          $rules = [
               'pas_foto' => 'mimes:pdf',
               'akta_kelahiran' => 'mimes:pdf',
               'ijasah_sekolah_menengah' => 'mimes:pdf',
               'judul_ta_id' => 'mimes:pdf',
               'judul_ta_en' => 'mimes:pdf',
               'bebas_pinjam_buku' => 'mimes:pdf',
               'transkrip_dari_sikad' => 'mimes:pdf',
               'resume_skk_dan_simskk' => 'mimes:pdf',
               'hasil_test_ept' => 'mimes:pdf',
               'bukti_pembayaran' => 'mimes:pdf',
               'surat_ganti_nama' => 'mimes:pdf',
               'form_biodata_peserta_yudisium' => 'mimes:pdf',
               'sertifikat_keahlian' => 'mimes:pdf',
               'poster_a3' => 'mimes:pdf',
               'buku_tugas_akhir_sah' => 'mimes:pdf',
               'jurnal_penelitian' => 'mimes:pdf',
          ];
          $messages = [
               'pas_foto.mimes' => 'Only PDF files are allowed.',
               'akta_kelahiran.mimes' => 'Only PDF files are allowed.',
               'ijasah_sekolah_menengah.mimes' => 'Only PDF files are allowed.',
               'judul_ta_id.mimes' => 'Only PDF files are allowed.',
               'judul_ta_en.mimes' => 'Only PDF files are allowed.',
               'bebas_pinjam_buku.mimes' => 'Only PDF files are allowed.',
               'transkrip_dari_sikad.mimes' => 'Only PDF files are allowed.',
               'resume_skk_dan_simskk.mimes' => 'Only PDF files are allowed.',
               'hasil_test_ept.mimes' => 'Only PDF files are allowed.',
               'bukti_pembayaran.mimes' => 'Only PDF files are allowed.',
               'surat_ganti_nama.mimes' => 'Only PDF files are allowed.',
               'form_biodata_peserta_yudisium.mimes' => 'Only PDF files are allowed.',
               'sertifikat_keahlian.mimes' => 'Only PDF files are allowed.',
               'poster_a3.mimes' => 'Only PDF files are allowed.',
               'buku_tugas_akhir_sah.mimes' => 'Only PDF files are allowed.',
               'jurnal_penelitian.mimes' => 'Only PDF files are allowed.',
          ];

          $validator = Validator::make($request->all(), $rules, $messages);

          $nrp = $request->input('inputNrp');
          $pas_foto = $request->input('inputPasFoto');
          if (!$validator->fails() && !empty($pas_foto)) {
               Yudisium::where('nrp', $nrp)->update(['pas_foto' => $pas_foto]);
          }
          $akta_kelahiran = $request->input('inputAktaKelahiran');
          if (!$validator->fails() && !empty($akta_kelahiran)) {
               Yudisium::where('nrp', $nrp)->update(['akta_kelahiran' => $akta_kelahiran]);
          }
          $ijasah_sekolah_menengah = $request->input('inputIjasahSekolahMenengah');
          if (!$validator->fails() && !empty($ijasah_sekolah_menengah)) {
               Yudisium::where('nrp', $nrp)->update(['ijasah_sekolah_menengah' => $ijasah_sekolah_menengah]);
          }
          $judul_ta_id = $request->input('inputJudulTugasAkhirIndonesia');
          if (!$validator->fails() && !empty($judul_ta_id)) {
               Yudisium::where('nrp', $nrp)->update(['judul_ta_id' => $judul_ta_id]);
          }
          $judul_ta_en = $request->input('inputJudulTugasAkhirInggris');
          if (!$validator->fails() && !empty($judul_ta_en)) {
               Yudisium::where('nrp', $nrp)->update(['judul_ta_en' => $judul_ta_en]);
          }
          $bebas_pinjam_buku = $request->input('inputBebasPinjamBuku');
          if (!$validator->fails() && !empty($bebas_pinjam_buku)) {
               Yudisium::where('nrp', $nrp)->update(['bebas_pinjam_buku' => $bebas_pinjam_buku]);
          }
          $transkrip_dari_sikad = $request->input('inputTranskripDariSikad');
          if (!$validator->fails() && !empty($transkrip_dari_sikad)) {
               Yudisium::where('nrp', $nrp)->update(['transkrip_dari_sikad' => $transkrip_dari_sikad]);
          }
          $resume_skk_dan_simskk = $request->input('inputResumeSkkDanSimskk');
          if (!$validator->fails() && !empty($resume_skk_dan_simskk)) {
               Yudisium::where('nrp', $nrp)->update(['resume_skk_dan_simskk' => $resume_skk_dan_simskk]);
          }
          $hasil_test_ept = $request->input('inputHasilTestEpt');
          if (!$validator->fails() && !empty($hasil_test_ept)) {
               Yudisium::where('nrp', $nrp)->update(['hasil_test_ept' => $hasil_test_ept]);
          }
          $bukti_pembayaran = $request->input('inputBuktiPembayaran');
          if (!$validator->fails() && !empty($bukti_pembayaran)) {
               Yudisium::where('nrp', $nrp)->update(['bukti_pembayaran' => $bukti_pembayaran]);
          }
          $surat_ganti_nama = $request->input('inputSuratGantiNama');
          if (!$validator->fails() && !empty($surat_ganti_nama)) {
               Yudisium::where('nrp', $nrp)->update(['surat_ganti_nama' => $surat_ganti_nama]);
          }
          $form_biodata_peserta_yudisium = $request->input('inputFormBiodataPesertaYudisium');
          if (!$validator->fails() && !empty($form_biodata_peserta_yudisium)) {
               Yudisium::where('nrp', $nrp)->update(['form_biodata_peserta_yudisium' => $form_biodata_peserta_yudisium]);
          }
          $sertifikat_keahlian = $request->input('inputSertifikatKeahlian');
          if (!$validator->fails() && !empty($sertifikat_keahlian)) {
               Yudisium::where('nrp', $nrp)->update(['sertifikat_keahlian' => $sertifikat_keahlian]);
          }
          $poster_a3 = $request->input('inputPoseterA3');
          if (!$validator->fails() && !empty($poster_a3)) {
               Yudisium::where('nrp', $nrp)->update(['poster_a3' => $poster_a3]);
          }
          $buku_tugas_akhir_sah = $request->input('inputBukuTugasAkhirSah');
          if (!$validator->fails() && !empty($buku_tugas_akhir_sah)) {
               Yudisium::where('nrp', $nrp)->update(['buku_tugas_akhir_sah' => $buku_tugas_akhir_sah]);
          }
          $jurnal_penelitian = $request->input('inputJurnalPenelitian');
          if (!$validator->fails() && !empty($jurnal_penelitian)) {
               Yudisium::where('nrp', $nrp)->update(['jurnal_penelitian' => $jurnal_penelitian]);
          }

          return redirect(URL::to('/dashboard-mahasiswa-yudisium'));
     }
     //
     public function resetPersyaratan($nrp, $persyaratan)
     {
          if ($nrp == Auth::user()->username) {
               Yudisium::where('nrp', $nrp)->update([$persyaratan => null]);
               return redirect(URL::to('/dashboard-mahasiswa-yudisium'));
          } else {
               return redirect(URL::to('/'));
          }
     }
}