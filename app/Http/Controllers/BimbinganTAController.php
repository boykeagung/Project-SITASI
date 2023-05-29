<?php

namespace App\Http\Controllers;

use App\Models\bimbingan_ta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

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

        try {
            // Kode query Anda
            // ...
            $input = $request->all();
            $input['status'] = "Diproses";
            // $input['status_p2'] = "Diproses";
            bimbingan_ta::create($input);

            return redirect('dashboard-mahasiswa-bimbingan-ta');
        } catch (QueryException $e) {
            abort(403, 'ID Tugas Akhir Belum terdaftar.');
            // throw new \Exception('Terjadi kesalahan dalam menjalankan query. Sepertinya Anda belum mendaftar Tugas Akhir  '); 
        }
    }

    public function edit($id)
    {
        $data['bimbingan_ta'] = bimbingan_ta::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-bimbingan-ta', $data);
        // return view('koordinator.dashboard-koordinator-edit-proposal-ta', $data);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        $input['status_p1'] = "Diproses";
        $input['status_p2'] = "Diproses";
        bimbingan_ta::find($id)->update($input);
        return redirect('dashboard-mahasiswa-bimbingan-ta');
    }
}
