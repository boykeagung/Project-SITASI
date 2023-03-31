<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoordinatorYudisiumController extends Controller
{
    public function index()
    {
        $yudisium = DB::table('yudisium')->join('mahasiswa', 'yudisium.nrp', '=', 'mahasiswa.nrp')->get();
        return view('koordinator_yudisium.dashboard-koordinator-yudisium', ['yudisium' => $yudisium]);
    }
}