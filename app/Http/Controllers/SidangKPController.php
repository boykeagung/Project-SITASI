<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\sidang_kp;
use Illuminate\Database\QueryException;

class SidangKPController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['sidang_kp'] = sidang_kp::all()->where('id_sidang_kp', '=', "SKP$username");
        return view('mahasiswa.dashboard-mahasiswa-sidang-kp', $data);
    }

    public function create()
    {
        return view('mahasiswa.dashboard-mahasiswa-tambah-sidang-kp');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [

                'laporan' => "mimes:pdf|max:25000",
                'id_kp' => 'required',
                'id_sidang_kp' => 'required',
            ]);

            $input = $request->all();
            $input['status'] = "Diproses";

            if ($draft = $request->file('laporan')) {
                $destinationPath = 'Laporan_KP/';
                $draftTA = time() . "_" . $draft->getClientOriginalName();
                $draft->move($destinationPath, $draftTA);
                $input['laporan'] = "$draftTA";
            }

            sidang_kp::create($input);

            return redirect('dashboard-mahasiswa-sidang-kp')->with('success', 'Daftar TA created successfully.');
        } catch (QueryException $e) {
            abort(403, 'ANDA BELUM MENDAFTAR KERJA PRAKTIK/DAFTAR SIDANG HANYA DAPAT SATU KALI!!!.');
            // throw new \Exception('Terjadi kesalahan dalam menjalankan query. Sepertinya Anda belum mendaftar Tugas Akhir  ');
        }
    }

    public function edit($id)
    {
        $data['sidang_kp'] = sidang_kp::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-sidang-kp', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [

            'laporan' => "mimes:pdf|max:10000",
            // 'id_kp' => 'required',
            // 'id_sidang_kp' => 'required',
        ]);

        $input = $request->all();
        $input['status'] = "Diproses";

        if ($draft = $request->file('laporan')) {
            $destinationPath = 'Laporan_KP/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['laporan'] = "$draftTA";
        } else {
            unset($input['laporan']);
        }


        sidang_kp::find($id)->update($input);

        return redirect('dashboard-mahasiswa-sidang-kp')->with('success', 'Daftar TA created successfully.');
    }
}
