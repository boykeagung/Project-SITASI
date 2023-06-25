<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\NilaiDosPemPerusahaan;
use DB;

class NilaiDospemPerusahaanController extends Controller
{
   

    public function create()
    {
        $data['nilai_dospem_perusahaan'] = NilaiDosPemPerusahaan::all();
        
        return view('mahasiswa.dashboard-mahasiswa-tambah-penilaian-kp-dospem-perusahaan');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'name' => 'required',
            'kepribadian' => 'required',
            'penguasaan_materi' => 'required',
            'keterampilan' => 'required',
            'kreatifitas' => 'required',
            'tanggung_jawab' => 'required',
            'komunikasi' => 'required',
            'pdf_nilai' => "mimes:pdf|max:25000"
        ]);

        // Local PDF
        if ($nilai = $request->file('pdf_nilai')) {
            $destinationPath = 'Nilai_KP_Dospem_Perusahaan/';
            $dospemPer = time() . "_" . $nilai->getClientOriginalName();
            $nilai->move($destinationPath, $dospemPer);
            $input['pdf_nilai'] = "$dospemPer";
        }

        //Calculate
        $nilaiDospemPer = round(( $request->kepribadian + $request->penguasaan_materi + 
        $request->keterampilan + $request->kreatifitas + 
        $request->tanggung_jawab + $request->komunikasi ) / 6 ,2);

        // Insert
        $input = $request->all();

        $username = $request->input('username'); //set username
        $input['username'] = "$username"; 

        $input['id_nilai_dospem_per'] = "NDPP$username"; //unique ID

        $input['rata_rata'] = "$nilaiDospemPer"; //hasil rata rata

        NilaiDosPemPerusahaan::create($input);


        // Insert rata-rata into Koor KP
        $input = DB::table('nilai_dospem_perusahaan')->get();
        foreach($input as $input){
            DB::table('nilai_koordinator_kp')
            ->where('username', '=', $username)
            ->updateOrInsert(['username'=> $username],['name'=> $input->name,'rataDospemPer'=> $input->rata_rata]); //insert data, jika sudah ada akan di update. Dicek berdasarkan username (nrp)
        }

        return redirect('dashboard-mahasiswa-penilaian-kp');
    }


    public function edit($id)
    {
        $data['nilai_dospem_perusahaan'] = NilaiDosPemPerusahaan::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-penilaian-kp-dospem-perusahaan', $data);
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

        NilaiDosPemPerusahaan::find($id)->update($input);
        return redirect('dashboard-mahasiswa-penilaian-kp')->with('success', 'Daftar KP created successfully.');
    }


    public function delete($id, Request $request)
    {
        $dospem = NilaiDosPemPerusahaan::find($id);
        $dospem->delete($request->all());
        return redirect('dashboard-mahasiswa-penilaian-kp');
    }

    public function generateNilai($id)
    {
        // $data['nilai_dospem_perusahaan'] = Form001::findOrFail($id)
        //     ->select('username', 'nama' ,'perusahaan1', 'alamat_perusahaan1', 'bidang_perusahaan1','perusahaan2', 'alamat_perusahaan2', 'bidang_perusahaan2')
        //     ->where('id', '=', $id)
        //     ->get($id);
        $pdf = PDF::loadView('mahasiswa.generate_nilai_kp', $data);
        return $pdf->stream();        
    }
}
