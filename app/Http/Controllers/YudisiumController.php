<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Yudisium;
use App\Models\Notifikasi;

class YudisiumController extends Controller
{
    public function index()
    {
        $yudisium = DB::table('yudisium')->join('mahasiswa', 'yudisium.nrp', '=', 'mahasiswa.nrp')->get();
        return view('yudisium.dashboard-list-pengajuan-yudisium', ['yudisium' => $yudisium]);
    }

    public function lihatBerkasMahasiswa($id)
    {
        $data = DB::table('yudisium')
            ->join('mahasiswa', 'yudisium.nrp', '=', 'mahasiswa.nrp')
            ->where('mahasiswa.nrp', '=', $id)->get();
        $detailAjuan = DB::table('notifikasi')
            ->where('notifikasi_milik', '=', $id)
            ->where('notifikasi_layanan', '=', 'Yudisium')
            ->get();
        return view('yudisium.dashboard-berkas-yudisium', ['data' => $data, 'detailAjuan' => $detailAjuan]);
    }

    public function aksiBerkasMahasiswa(Request $req)
    {
        $by = $req->input('inputBy');
        $nrp = $req->input('inputNrp');
        $komentar = $req->input('inputKomentar');
        $keputusan = $req->input('inputKeputusan');
        if ($by == 'tu') {
            Yudisium::where('nrp', $nrp)->update(['status_yudisium' => $keputusan, 'tanggal_modifikasi_tu' => now(), 'komentar_tu' => $komentar]);
            if ($keputusan == 'Mengisi') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_milik' => $nrp,
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_pesan' => 'Formulir pendaftaran Yudisium ditolak oleh TU',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_waktu' => now(),
                            'notifikasi_layanan' => 'Yudisium',
                            'notifikasi_baca' => 0
                        ],
                        [
                            'notifikasi_milik' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_pesan' => 'Anda menolak formulir pendaftaran Yudisium mahasiswa ' . $nrp,
                            'notifikasi_link' => 'dashboard-tata-usaha-yudisium/berkas/' . $nrp,
                            'notifikasi_waktu' => now(),
                            'notifikasi_layanan' => 'Yudisium',
                            'notifikasi_baca' => 0
                        ]
                    )
                );
            } else if ($keputusan == 'Dikonfirmasi TU') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_milik' => $nrp,
                            'notifikasi_icon' => 'fas fa-check',
                            'notifikasi_pesan' => 'Formulir pendaftaran anda diterima Tata Usaha, tunggu konfirmasi dari Koordinator Yudisium',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_waktu' => now(),
                            'notifikasi_layanan' => 'Yudisium',
                            'notifikasi_baca' => 0
                        ],
                        [
                            'notifikasi_milik' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-user-check',
                            'notifikasi_pesan' => 'Anda mengkonfirmasi formulir pendaftaran Yudisium mahasiswa ' . $nrp . '.',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_waktu' => now(),
                            'notifikasi_layanan' => 'Yudisium',
                            'notifikasi_baca' => 0
                        ],
                        [
                            'notifikasi_milik' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fa-inbox',
                            'notifikasi_pesan' => 'Formulir pendaftaran Yudisium mahasiswa ' . $nrp . ', telah dikonfirmasi Tata Usaha.',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_waktu' => now(),
                            'notifikasi_layanan' => 'Yudisium',
                            'notifikasi_baca' => 0
                        ]
                    )
                );
            }
            return redirect()->back();
        } else if ($by == 'koor') {
            Yudisium::where('nrp', $nrp)->update(['status_yudisium' => $keputusan, 'tanggal_modifikasi_koordinator' => now(), 'komentar_koordinator' => $komentar]);
            if ($keputusan == 'Mengisi') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_milik' => $nrp,
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_pesan' => 'Formulir pendaftaran Yudisium ditolak Koordinator Yudisium',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_waktu' => now(),
                            'notifikasi_layanan' => 'Yudisium',
                            'notifikasi_baca' => 0
                        ],
                        [
                            'notifikasi_milik' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_pesan' => 'Anda menolak formulir pendaftaran Yudisium mahasiswa ' . $nrp,
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_waktu' => now(),
                            'notifikasi_layanan' => 'Yudisium',
                            'notifikasi_baca' => 0
                        ]
                    )
                );
            } else if ($keputusan == 'Diterima') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_milik' => $nrp,
                            'notifikasi_icon' => 'fas fa-user-graduate',
                            'notifikasi_pesan' => 'Selamat! formulir pendaftaran Yudisium diterima, lihat detail Yudisium.',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium/tentang-yudisium',
                            'notifikasi_waktu' => now(),
                            'notifikasi_layanan' => 'Yudisium',
                            'notifikasi_baca' => 0
                        ],
                        [
                            'notifikasi_milik' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fa-user-graduate',
                            'notifikasi_pesan' => 'Anda menerima formulir pendaftaran Yudisium mahasiswa ' . $nrp . '.',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_waktu' => now(),
                            'notifikasi_layanan' => 'Yudisium',
                            'notifikasi_baca' => 0
                        ]
                    )
                );
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}