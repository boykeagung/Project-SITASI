<?php

namespace App\Http\Controllers;

use App\Models\bimbingan_ta;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BimbinganTAController extends Controller
{
    //index 
    public function index()
    {
        $username = Auth::user()->username;
        $data['bimbingan_ta'] = bimbingan_ta::all()->where('id_ta', '=', "TA$username");
        return view('mahasiswa.dashboard-mahasiswa-bimbingan-ta', $data);
    }

    public function create()
    {
        $data['bimbingan_ta'] = bimbingan_ta::all();
        return view('mahasiswa.dashboard-mahasiswa-tambah-bimbingan-ta');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        bimbingan_ta::create($input);
        return redirect('dashboard-mahasiswa-bimbingan-ta');
    }
}
