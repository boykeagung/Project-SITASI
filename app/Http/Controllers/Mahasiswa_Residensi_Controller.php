<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa_Residensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class Mahasiswa_Residensi_Controller extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['residensi'] = Mahasiswa_Residensi::all()->where('id_residensi', '=', "RS$username");
        return view('mahasiswa.dashboard-mahasiswa-residensi-ta', $data);
    }

    public function create()
    {
        $data['residensi'] = Mahasiswa_Residensi::all();
        return view('mahasiswa.dashboard-mahasiswa-tambah-residensi-ta');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'tanggal' => 'required',
                'jam_masuk' => 'required'
            ]);

            $input = $request->all();

            Mahasiswa_Residensi::create($input);

            return redirect('dashboard-mahasiswa-residensi-ta')->with('success', 'Residensi Berhasil.');
        } catch (QueryException $e) {

            abort(403, 'ANDA BELUM MENDAFTAR TUGAS AKHIR!!!.');
            // throw new \Exception('Terjadi kesalahan dalam menjalankan query. Sepertinya Anda belum mendaftar Tugas Akhir  ');
        }
    }

    public function edit($id)
    {
        $data['residensi'] = Mahasiswa_Residensi::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-residensi-ta', $data);
    }

    public function update($id, Request $request)
    {

        $input = $request->all();

        Mahasiswa_Residensi::find($id)->update($input);

        return redirect('dashboard-mahasiswa-residensi-ta')->with('success', 'Residensi Berhasil.');
    }

    public function delete($id, Request $request)
    {
        $res = Mahasiswa_Residensi::find($id);
        $res->delete($request->all());
        return redirect('dashboard-mahasiswa-residensi-ta');
    }
}
