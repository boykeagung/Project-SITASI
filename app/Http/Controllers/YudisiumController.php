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
        $keabsahan = $req->input('inputKeabsahan');
        $keputusan = $req->input('inputKeputusan');
        if ($by == 'tu') {
            Yudisium::where('nrp', $nrp)->update(['status_yudisium' => $keabsahan, 'tanggal_modifikasi_tu' => now(), 'komentar_tu' => $komentar]);
            if ($keputusan == 'Mengisi') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_own' => $nrp,
                            'notifikasi_icon' => 'fas fa-edit',
                            'notifikasi_color' => 'warning',
                            'notifikasi_message' => 'Formulir yudisium anda perlu revisi!',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-edit',
                            'notifikasi_color' => 'warning',
                            'notifikasi_message' => 'Mahasiswa ' . $nrp . ' merevisi formulir yudisium',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fa-edit',
                            'notifikasi_color' => 'warning',
                            'notifikasi_message' => 'Mahasiswa ' . $nrp . ' merevisi formulir yudisium',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                    )
                );
            } else if ($keputusan == 'Dikonfirmasi TU') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_own' => $nrp,
                            'notifikasi_icon' => 'fas fas fa-user-check',
                            'notifikasi_color' => 'primary',
                            'notifikasi_message' => 'Keabsahan formulir yudisium Anda dikonfirmasi sistem',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fas fa-user-check',
                            'notifikasi_color' => 'primary',
                            'notifikasi_message' => 'Keabsahan formulir yudisium mahasiswa ' . $nrp . ' dikonfirmasi',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fas fa-user-check',
                            'notifikasi_color' => 'primary',
                            'notifikasi_message' => 'Keabsahan formulir yudisium mahasiswa ' . $nrp . ' dikonfirmasi',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
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
                            'notifikasi_message' => 'Formulir yudisium Anda ditolak Koordinator Yudisium',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_color' => 'danger',
                            'notifikasi_message' => 'Formulir yudisium ditolak Koordinator Yudisium',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fa-times',
                            'notifikasi_color' => 'danger',
                            'notifikasi_message' => 'Formulir yudisium ditolak Koordinator Yudisium',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                    )
                );
            } else if ($keputusan == 'Diterima') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_own' => $nrp,
                            'notifikasi_icon' => 'fas fa-check',
                            'notifikasi_color' => 'success',
                            'notifikasi_message' => 'Formulir yudisium Anda diterima!',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_tu'),
                            'notifikasi_icon' => 'fas fa-check',
                            'notifikasi_color' => 'success',
                            'notifikasi_message' => 'Formulir yudisium diterima!',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                        [
                            'notifikasi_own' => config('global.id_ky'),
                            'notifikasi_icon' => 'fas fa-check',
                            'notifikasi_color' => 'success',
                            'notifikasi_message' => 'Formulir yudisium diterima!',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_time' => now(),
                            'notifikasi_context' => 'Yudisium',
                            'notifikasi_read' => 0
                        ],
                    )
                );
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}