<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Bimbingan_kp;

use Illuminate\Http\Request;

class BimbinganKPController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['bimbingan_kp'] = Bimbingan_kp::all()->where('id_ta', '=', "TA$username");
        return view('mahasiswa.dashboard-mahasiswa-bimbingan-kp', $data);
    }

    public function create()
    {
        $data['bimbingan_kp'] = Bimbingan_kp::all();
        return view('mahasiswa.dashboard-mahasiswa-tambah-bimbingan-kp');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['status_p1'] = "Diproses";
        // $input['status_p2'] = "Diproses";
        Bimbingan_kp::create($input);
        return redirect('dashboard-mahasiswa-bimbingan-kp');
    }

    public function edit($id)
    {
        $data['bimbingan_kp'] = Bimbingan_kp::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-bimbingan-kp', $data);
        // return view('koordinator.dashboard-koordinator-edit-proposal-ta', $data);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        $input['status_p1'] = "Diproses";
        // $input['status_p2'] = "Diproses";
        Bimbingan_kp::find($id)->update($input);
        return redirect('dashboard-mahasiswa-bimbingan-kp');
    }
}
