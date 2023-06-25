<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\NilaiDosPem;
use App\Models\NilaiDosPemPerusahaan;
use App\Models\NilaiKoordinatorKP;
use Illuminate\Support\Facades\DB;



class NilaiKoordinatorKPController extends Controller
{
    
    public function index()
    {

        $data['nilai_koordinator_kp'] = NilaiKoordinatorKP::all();
        $data['nilai_dospem'] = NilaiDosPem::all();
        $data['nilai_dospem_perusahaan'] = NilaiDosPemPerusahaan::all();

        // =========================================================================
        //Nilai rata-rata
        // $name['user'] = User::select();
        // $name = User::select()->username;

        // $nilaiDospem = NilaiDosPem::groupBy('id')
        // ->sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6')); 
        // $rataDospem = round($nilaiDospem, 2);       

        // $nilaiDospemPerusahaan = NilaiDosPemPerusahaan:: groupBy(\DB::raw('username'))
        // ->sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6'))
        // ;
        // $rataDospemPerusahaan = round($nilaiDospemPerusahaan, 2);

        // $akhir = ($rataDospemPerusahaan + $rataDospem) / 2;

        // if ($akhir <= 39 ) {
		// 	$temp = 'E';
		// } else if ($akhir <= 49) {
		// 	$temp = 'D';
		// } else if ($akhir <= 59) {
		// 	$temp = 'C';
		// } else if ($akhir <= 64) {
		// 	$temp = 'BC';
		// } else if ($akhir <= 73) {
        //     $temp = 'B';
        // }
        // else if ($akhir <= 79) {
		// 	$temp = 'AB';
        // }
        // else if ($akhir <= 80) {
		// 	$temp = 'A';
        // }else
		// 	$temp = 'A';

        return view('koordinator_kp.dashboard-koordinator-penilaian-kp', $data);
    }

    public function create()
    {
        $data['nilai_koordinator_kp'] = NilaiKoordinatorKP::all();
        return view('koordinator_kp.dashboard-koordinator-tambah-penilaian-kp');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_nilai_koor',


        ]);

        $input = $request->all();
        // $password = bcrypt($request->input('password'));

        $input['status'] = "Diproses";


        $nilaiDospem = NilaiDosPem::sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6')); 
        $rataDospem = round($nilaiDospem, 2);

        $nilaiDospemPerusahaan = NilaiDosPemPerusahaan::sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6'));
        
        $rataDospemPerusahaan = round($nilaiDospemPerusahaan, 2);

        if ($nilai = $request->file('pdf_nilai')) {
            $destinationPath = 'Nilai_KP_Dospem/';
            $dospem = time() . "_" . $nilai->getClientOriginalName();
            $nilai->move($destinationPath, $dospem);
            $input['pdf_nilai'] = "$dospem";
        }



        NilaiKoordinatorKP::create($input, ['rataDospem'=>$rataDospem,'rataDospemPerusahaan'=>$rataDospemPerusahaan]);
        return redirect('dashboard-koordinator-penilaian-kp');
    }

    public function edit($id)
    {
        $data['nilai_koordinator_kp'] = NilaiKoordinatorKP::find($id);
        return view('koordinator_kp.dashboard-koordinator-edit-penilaian-kp', $data);
    }

    public function update($id, Request $request)
    {
    
        $this->validate($request, [
            'pdf_nilai' => "mimes:pdf|max:5000",

        ]);


        // // Konversi Nilai
        // // Nilai (Dosen Pembimbing Perusahaan + Dosen Pembimbing Perusahaan) / 2
        // $akhirPem = ($rataDospemPerusahaan + $rataDospem) / 2;

        // // Nilai rata-rata Sidang
        // $rataSidang = NilaiKoordinatorKP::where('username', '=', $username)
        // ->sum(\DB::raw('(sidang_penguji + sidang_pembimbing) / 2'));

        // // Nilai Akhir
        // $nilaiAkhir = ($akhirPem + $rataSidang) / 2;

        $input = $request->all();

        $sidang_penguji = $request->input('sidang_penguji');
        $sidang_pembimbing = $request->input('sidang_pembimbing');
        $rataDospem = $request->input('rataDospem');
        $rataDospemPer = $request->input('rataDospemPer');

        
        $akhir = round(((($sidang_penguji + $sidang_pembimbing) / 2) + (($rataDospem + $rataDospemPer) / 2)) /2, 2);

        if ($akhir <= 39 ) {
			$konversi = 'E';
		} else if ($akhir <= 49) {
			$konversi = 'D';
		} else if ($akhir <= 59) {
			$konversi = 'C';
		} else if ($akhir <= 64) {
			$konversi = 'BC';
		} else if ($akhir <= 73) {
            $konversi = 'B';
        }
        else if ($akhir <= 79) {
			$konversi = 'AB';
        }
        else if ($akhir <= 80) {
			$konversi = 'A';
        }else
			$konversi = 'A';


        $input = $request->all();

        $input['nilai_akhir'] = "$konversi"; // nilai akhir

        NilaiKoordinatorKP::find($id)->update($input);
        return redirect('dashboard-koordinator-penilaian-kp')->with('success');
    }
    
}
