<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\KP;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class KPController extends Controller
{
    //

    public function index()
    {
        $username = Auth::user()->username;
        $data['kp'] = KP::all()->where('username', '=', $username);
        return view('mahasiswa.dashboard-mahasiswa-kp', $data);
    }

    public function create()
    {
        return view('mahasiswa.dashboard-mahasiswa-tambah-kp');
        // $ta = TA::get();
        // return view('mahasiswa.dashboard-mahasiswa-tambah-ta', ['ta' => $ta]);
    }

    public function store(Request $request)
    {

        try {
            $this->validate($request, [

                'id_kp' => 'required',
                'username' => 'required',
            ]);

            $input = $request->all();

            KP::create($input);

            return redirect('dashboard-mahasiswa-kp')->with('success', 'Daftar KP created successfully.');
        } catch (QueryException $e) {
            abort(403, 'ANDA HANYA DAPAT MENDAFTAR KERJA PRAKTIK SATU KALI!!!.');
            // throw new \Exception('Terjadi kesalahan dalam menjalankan query. Sepertinya Anda belum mendaftar Tugas Akhir  ');
        }
    }

    public function edit($id)
    {
        $data['kp'] = KP::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-kp', $data);
    }

    public function update($id, Request $request)
    {
        // $ta = Seminar::find($id);
        // $ta->update($request->all());
        // return redirect('dashboard-mahasiswa-seminar-ta');
        $this->validate($request, [

            // 'id_kp' => 'required',
            // 'username' => 'required',
        ]);

        $input = $request->all();
        // $input['status'] = "Diproses";

        KP::find($id)->update($input);

        return redirect('dashboard-mahasiswa-kp')->with('success', 'Daftar KP created successfully.');
    }

    public function delete($id, Request $request)
    {
        $ta = KP::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-mahasiswa-kp');
    }
}
