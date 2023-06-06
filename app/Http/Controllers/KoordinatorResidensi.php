<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa_Residensi;
use Illuminate\Support\Facades\Auth;

class KoordinatorResidensi extends Controller
{
    //
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['residensi'] = Mahasiswa_Residensi::all();
        return view('koordinator.dashboard-koordinator-residensi-ta', $data);
    }
}
