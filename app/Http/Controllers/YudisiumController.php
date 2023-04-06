<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Yudisium;

class YudisiumController extends Controller
{
    public function index()
    {
        $yudisium = DB::table('yudisium')->join('mahasiswa', 'yudisium.nrp', '=', 'mahasiswa.nrp')->get();
        return view('yudisium.dashboard-list-pengajuan-yudisium', ['yudisium' => $yudisium]);
    }

    public function lihatBerkasMahasiswa(Request $request, $id)
    {
        $data = DB::table('yudisium')->join('mahasiswa', 'yudisium.nrp', '=', 'mahasiswa.nrp')->where('mahasiswa.nrp', '=', $id)->get();
        return view('yudisium.dashboard-berkas-yudisium', ['data' => $data]);
    }

    public function aksiBerkasMahasiswa(Request $req)
    {
        $by = $req->input('inputBy');
        $nrp = $req->input('inputNrp');
        $komentar = $req->input('inputKomentar');
        $keputusan = $req->input('inputKeputusan');
        if ($by == 'tu') {
            Yudisium::where('nrp', $nrp)->update(['status_yudisium' => $keputusan, 'tanggal_modifikasi_tu' => now(), 'komentar_tu' => $komentar]);
            return redirect()->back();
        } else if ($by == 'koor') {
            Yudisium::where('nrp', $nrp)->update(['status_yudisium' => $keputusan, 'tanggal_modifikasi_koordinator' => now(), 'komentar_koordinator' => $komentar]);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}