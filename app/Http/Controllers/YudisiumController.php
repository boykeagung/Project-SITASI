<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
            ->where('notifikasi_own', '=', Auth::user()->username)
            ->where('notifikasi_context', '=', 'Yudisium')
            ->orderBy('notifikasi_time', 'DESC')
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
                            'notifikasi_own' => $nrp,
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_color' => 'danger',
                            'notifikasi_message' => 'Formulir pendaftaran Yudisium ditolak oleh Tata Usaha',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_color' => 'danger',
                            'notifikasi_message' => 'Anda menolak formulir pendaftaran Yudisium mahasiswa ' . $nrp,
                            'notifikasi_link' => 'dashboard-tata-usaha-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ]
                    )
                );
            } else if ($keputusan == 'Dikonfirmasi TU') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_own' => $nrp,
                            'notifikasi_icon' => 'fas fa-check',
                            'notifikasi_color' => 'success',
                            'notifikasi_message' => 'Formulir pendaftaran anda diterima Tata Usaha, tunggu konfirmasi dari Koordinator Yudisium',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-user-check',
                            'notifikasi_color' => 'success',
                            'notifikasi_message' => 'Anda mengkonfirmasi formulir pendaftaran Yudisium mahasiswa ' . $nrp . '.',
                            'notifikasi_link' => 'dashboard-tata-usaha-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fa-inbox',
                            'notifikasi_color' => 'info',
                            'notifikasi_message' => 'Tata Usaha menyerahkan formulir pendaftaran Yudisium mahasiswa ' . $nrp,
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
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
                            'notifikasi_own' => $nrp,
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_color' => 'danger',
                            'notifikasi_message' => 'Formulir pendaftaran Yudisium ditolak Koordinator Yudisium',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_color' => 'danger',
                            'notifikasi_message' => 'Koordinator Yudisium menolak formulir pendaftaran Yudisium mahasiswa ' . $nrp,
                            'notifikasi_link' => 'dashboard-tata-usaha-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_color' => 'danger',
                            'notifikasi_message' => 'Anda menolak formulir pendaftaran Yudisium mahasiswa ' . $nrp,
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ]
                    )
                );
            } else if ($keputusan == 'Diterima') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_own' => $nrp,
                            'notifikasi_icon' => 'fas fa-user-graduate',
                            'notifikasi_color' => 'success',
                            'notifikasi_message' => 'Selamat! formulir pendaftaran Yudisium disetujui, lihat detail Yudisium.',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fa-user-graduate',
                            'notifikasi_color' => 'success',
                            'notifikasi_message' => 'Anda menyetujui formulir pendaftaran Yudisium mahasiswa ' . $nrp . '.',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_color' => 'danger',
                            'notifikasi_message' => 'Koordinator Yudisium menyetujui formulir pendaftaran Yudisium mahasiswa ' . $nrp,
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
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