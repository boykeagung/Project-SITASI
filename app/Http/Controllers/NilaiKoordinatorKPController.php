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

        // $data['nilai_koordinator_kp'] = NilaiKoordinatorKP::join('nilai_dospem', 'nilai_koordinator_kp.rataDospem', '=', 'nilai_dospem.rata_rata')
        // ->join('nilai_dospem_perusahaan', 'nilai_dospem.username', '=', 'nilai_dospem_perusahaan.username')
        // ->select('nilai_koordinator_kp.*', 'nilai_dospem_perusahaan.name', 'nilai_dospem.username')
        // ->get();


        // $data['nilai_koordinator_kp'] = DB::table('nilai_koordinator_kp')
        // ->join('user', 'nilai_koordinator_kp.username', '=', 'user.username')
        // ->join('nilai_dospem', 'nilai_koordinator_kp.id_nilai_dospem', '=', 'nilai_dospem.id_nilai_koor')
        // ->join('nilai_dospem_perusahaan', 'nilai_koordinator_kp.id_nilai_dospem_per', '=', 'nilai_dospem_perusahaan.id_nilai_koor')
        // ->select('user.username', 'nilai_dospem.rata_rata', 'nilai_dospem_perusahaan.rata_rata')
        // ->insertUsing(['username', 'rataDospem', 'rataDospemPer'], function ($query) {
        //     $query->from('user')
        //         ->join('user', 'nilai_koordinator_kp.username', '=', 'user.username')
        //         ->join('nilai_dospem', 'nilai_koordinator_kp.id_nilai_dospem', '=', 'nilai_dospem.id_nilai_koor')
        //         ->join('nilai_dospem_perusahaan', 'nilai_koordinator_kp.id_nilai_dospem_per', '=', 'nilai_dospem_perusahaan.id_nilai_koor')
        //         ->select('user.username', 'nilai_dospem.rata_rata', 'nilai_dospem_perusahaan.rata_rata');
        // }); 

        // $data['nilai_koordinator_kp'] = DB::table('nilai_koordinator_kp')
        // ->join('nilai_dospem as ndp', 'nilai_koordinator_kp.id_nilai_koor', '=', 'ndp.id_nilai_koor')
        // ->join('nilai_dospem_perusahaan as ndpp', 'nilai_koordinator_kp.id_nilai_koor', '=', 'ndpp.id_nilai_koor')
        // ->select('ndp.rata_rata', 'ndpp.rata_rata')
        // ->insertUsing(['rataDospem', 'rataDospemPer'], function ($query) {
        //     $query->from('nilai_dospem')
        //         ->join('nilai_dospem as ndp', 'nilai_koordinator_kp.id_nilai_koor', '=', 'ndp.id_nilai_koor')
        //         ->join('nilai_dospem_perusahaan as ndpp', 'nilai_koordinator_kp.id_nilai_koor', '=', 'ndpp.id_nilai_koor')
        //         ->select('ndp.rata_rata as ndpp', 'ndpp.rata_rata');
        // });

        $data['nilai_koordinator_kp'] = NilaiKoordinatorKP::
        join('nilai_dospem', 'nilai_koordinator_kp.id_nilai_dospem', '=', 'nilai_dospem.id_nilai_dospem')
        ->join('users', 'nilai_dospem.username', '=', 'users.username')
        ->select('nilai_dospem.rata_rata', 'users.username')
        ->get();


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

        ]);

        $input = $request->all();
        // $password = bcrypt($request->input('password'));

        $input['status'] = "Diproses";

        $nilaiDospem = NilaiDosPem::sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6')); 
        $rataDospem = round($nilaiDospem, 2);

        $nilaiDospemPerusahaan = NilaiDosPemPerusahaan::sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6'))
        ;
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
    
}
