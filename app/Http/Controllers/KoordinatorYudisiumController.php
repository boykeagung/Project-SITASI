<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoordinatorYudisiumController extends Controller
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
}