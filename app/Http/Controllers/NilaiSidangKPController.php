<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\NilaiDosPem;
use App\Models\NilaiDosPemPerusahaan;
use App\Models\NilaiKoordinatorKP;

class NilaiSidangKPController extends Controller
{
    // public function index()
    // {

    //     $username = Auth::user()->username;
    //     $data['nilai_dospem'] = NilaiDosPem::all()->where('username', '=', $username);
    //     $data['nilai_dospem_perusahaan'] = NilaiDosPemPerusahaan::all()->where('username', '=', $username);
    //     $data['nilai_koordinator_kp'] = NilaiKoordinatorKP::all()->where('username', '=', $username);

    //     //Nilai rata-rata
    //     $nilaiDospem = NilaiDosPem::
    //     where('username', '=', $username)
    //     ->sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6')); 
    //     $rataDospem = round($nilaiDospem, 2);

    //     $nilaiDospemPerusahaan = NilaiDosPemPerusahaan::where('username', '=', $username)
    //     ->sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6'));
    //     $rataDospemPerusahaan = round($nilaiDospemPerusahaan, 2);
        

    //     return view('mahasiswa.dashboard-mahasiswa-penilaian-kp', $data, ['rataDospem'=>$rataDospem,'rataDospemPerusahaan'=>$rataDospemPerusahaan]);
    // }

    public function create()
    {
        $data['nilai_koordinator_kp'] = NilaiKoordinatorKP::all();
        return view('mahasiswa.dashboard-mahasiswa-tambah-penilaian-sidang-kp');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
           
        ]);

        $input = $request->all();
        // $password = bcrypt($request->input('password'));

        $input['status'] = "Diproses";

        if ($nilai = $request->file('pdf_nilai')) {
            $destinationPath = 'Nilai_KP_Dospem/';
            $dospem = time() . "_" . $nilai->getClientOriginalName();
            $nilai->move($destinationPath, $dospem);
            $input['pdf_nilai'] = "$dospem";
        }


        NilaiKoordinatorKP::create($input);
        return redirect('dashboard-mahasiswa-penilaian-kp');
    }

    public function edit($id)
    {
        $data['nilai_dospem'] = NilaiDosPem::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-penilaian-kp-dospem', $data);
    }

    public function update($id, Request $request)
    {
    
        $this->validate($request, [
            'pdf_nilai' => "mimes:pdf|max:5000",

        ]);

        $input = $request->all();
        // $input['status'] = "Diproses";

        if ($nilai = $request->file('pdf_nilai')) {
            $destinationPath = 'Nilai_KP_Dospem_Perusahaan/';
            $dospemPer = time() . "_" . $nilai->getClientOriginalName();
            $nilai->move($destinationPath, $dospemPer);
            $input['pdf_nilai'] = "$dospemPer";
        } else {
            unset($input['pdf_nilai']);
        }

        NilaiDosPem::find($id)->update($input);
        return redirect('dashboard-mahasiswa-penilaian-kp')->with('success', 'Daftar KP created successfully.');
    }


    public function delete($id, Request $request)
    {
        $dospem = NilaiDosPem::find($id);
        $dospem->delete($request->all());
        return redirect('dashboard-mahasiswa-penilaian-kp');
    }


    // public function rataDospem(){

    //     $rataDospem = NilaiDosPem::avg('nilai_dospem');
    // }


    public function generateNilai($id)
    {
        // $data['kp_form001'] = Form001::findOrFail($id)
        //     ->select('username', 'nama' ,'perusahaan1', 'alamat_perusahaan1', 'bidang_perusahaan1','perusahaan2', 'alamat_perusahaan2', 'bidang_perusahaan2')
        //     ->where('id', '=', $id)
        //     ->get($id);
        $pdf = PDF::loadView('mahasiswa.generate_nilai_kp', $data);
        return $pdf->stream();

             
    }

}
