<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\NilaiDosPem;

class NilaiDosPemController extends Controller
{

    public function index()
    {

        $username = Auth::user()->username;
        $data['nilai_dospem'] = NilaiDosPem::all()->where('username', '=', $username);
        $data['file_pdf'] = NilaiDosPem::all()->where('username', '=', $username);

        return view('mahasiswa.dashboard-mahasiswa-penilaian-kp', $data);
    }

    public function create()
    {
        $data['nilai_dospem'] = NilaiDosPem::all();
        return view('mahasiswa.dashboard-mahasiswa-tambah-penilaian-kp');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'kepribadian' => 'required',
            'penguasaan_materi' => 'required',
            'keterampilan' => 'required',
            'kreatifitas' => 'required',
            'tanggung_jawab' => 'required',
            'komunikasi' => 'required',
        ]);

        $input = $request->all();
        $password = bcrypt($request->input('password'));

        $input['password'] = "$password";



        if ($foto = $request->file('foto')) {
            $destinationPath = 'Foto_Mahasiswa/';
            $fotoTa = time() . "_" . $foto->getClientOriginalName();
            $foto->move($destinationPath, $fotoTa);
            $input['foto'] = "$fotoTa";
        }

        NilaiDosPem::create($input);
        return redirect('dashboard-mahasiswa-penilaian-kp');
    }



    public function generateNilai($id)
    {
        // $data['kp_form001'] = Form001::findOrFail($id)
        //     ->select('username', 'nama' ,'perusahaan1', 'alamat_perusahaan1', 'bidang_perusahaan1','perusahaan2', 'alamat_perusahaan2', 'bidang_perusahaan2')
        //     ->where('id', '=', $id)
        //     ->get($id);
        $pdf = PDF::loadView('dosen.penilaian_dospem_kp', $data);
        return $pdf->stream();

             
    }
}
