<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Bimbingan_kp;
use Illuminate\Database\QueryException;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;

class BimbinganKPController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['bimbingan_kp'] = Bimbingan_kp::all()->where('id_kp', '=', "KP$username");
        return view('mahasiswa.dashboard-mahasiswa-bimbingan-kp', $data);
    }

    public function create()
    {
        $data['bimbingan_kp'] = Bimbingan_kp::all();
        return view('mahasiswa.dashboard-mahasiswa-tambah-bimbingan-kp');
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $input['status_p1'] = "Diproses";
            // $input['status_p2'] = "Diproses";
            Bimbingan_kp::create($input);
            return redirect('dashboard-mahasiswa-bimbingan-kp');
        } catch (QueryException $e) {
            abort(403, 'ID Kerja Praktik Belum terdaftar.');
            // throw new \Exception('Terjadi kesalahan dalam menjalankan query. Sepertinya Anda belum mendaftar Tugas Akhir  ');
        }
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

    public function generate()
    {
        $username = Auth::user()->username;
        $data['bimbingan_kp'] = Bimbingan_kp::all()->where('id_kp', '=', "KP$username");
        $pdf = PDF::loadView('mahasiswa.dashboard-mahasiswa-bimbingan-kp-print', $data);
        return $pdf->stream();
    }
}
