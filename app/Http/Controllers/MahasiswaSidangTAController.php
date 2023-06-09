<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SidangTA;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MahasiswaSidangTAController extends Controller
{
    public function index()
    {
        $username = Auth::user()->username;
        $data['sidang_ta'] = SidangTA::all()->where('id_sidang_ta', '=', "SDTA$username");
        return view('mahasiswa.dashboard-mahasiswa-sidang-ta', $data);
    }

    public function create()
    {
        $data['sidang_ta'] = SidangTA::all();
        return view('mahasiswa.dashboard-mahasiswa-sidang-ta-tambah-data');
    }

    public function storee(Request $req)
    {
        try {
            $this->validate($req, [
                // 'id_sidang_ta' => "required",
                // 'id_ta' => 'required',
                'judul' => 'required',
                'buku_ta' => 'required|mimes:pdf|max:25000',
                'ruangan' => 'required',
                'jam_sidang' => 'required',
                'jadwal_sidang' => 'required',
                // 'status' => 'required'
            ]);
            $input = $req->all();
            $input['status'] = "Diproses";
            if ($buku_ta = $req->file('buku_ta')) {
                $destinationPath = 'Draft_Buku_TA/';
                $buku_ta_name = $buku_ta->getClientOriginalName();
                $buku_ta->move($destinationPath, $buku_ta_name);
                $input['buku_ta'] = "$buku_ta_name";
            }

            SidangTA::create($input);

            return redirect('dashboard-mahasiswa-sidang-ta')->with('success', 'Sidang TA created successfully.');
        } catch (QueryException $e) {
            abort(403, 'ANDA BELUM MENDAFTAR TUGAS AKHIR/DAFTAR SIDANG HANYA DAPAT SATU KALI!!!.');
            // throw new \Exception('Terjadi kesalahan dalam menjalankan query. Sepertinya Anda belum mendaftar Tugas Akhir  ');
        }
    }

    public function edit($id)
    {
        $data['sidang_ta'] = SidangTA::find($id);
        return view('mahasiswa.dashboard-mahasiswa-sidang-ta-edit-data', $data);
    }

    public function update($id, Request $req)
    {
        // $sidang_ta = Mahasiswa_Sidang_TA::find($id);
        // $sidang_ta->update($request->all());
        // return redirect('dashboard-mahasiswa-sidang-ta');

        $this->validate($req, [
            // 'id_sidang_ta' => "required",
            // 'id_ta' => 'required',
            'judul' => 'required',
            'buku_ta' => "mimes:pdf|max:25000"
            // 'ruangan' => 'required',
            // 'jam_sidang' => 'required',
            // 'jadwal_sidang' => 'required',
            // 'status' => 'required'
        ]);

        $input = $req->all();
        $input['status'] = "Diproses";

        if ($buku_ta = $req->file('buku_ta')) {
            $destinationPath = 'Draft_Buku_TA/';
            $buku_ta_name = $buku_ta->getClientOriginalName();
            $buku_ta->move($destinationPath, $buku_ta_name);
            $input['buku_ta'] = "$buku_ta_name";
        } else {
            unset($input['buku_ta']);
        }
        SidangTA::find($id)->update($input);
        return redirect('dashboard-mahasiswa-sidang-ta')->with('success', 'Sidang TA edited successfully.');
    }

    public function delete($id, Request $request)
    {
        $sidang_ta = SidangTA::find($id);
        $sidang_ta->delete($request->all());
        return redirect('dashboard-mahasiswa-sidang-ta');
    }
}
