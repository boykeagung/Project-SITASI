<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\NilaiDosPem;
use App\Models\NilaiDosPemPerusahaan;
use App\Models\NilaiKoordinatorKP;


class NilaiKoordinatorKPController extends Controller
{
    
    public function index()
    {

        $username = Auth::user()->username;
        $data['nilai_dospem'] = NilaiDosPem::all();
        $data['nilai_dospem_perusahaan'] = NilaiDosPemPerusahaan::all();
        $data['nilai_koordinator_kp'] = NilaiKoordinatorKP::all();


        //Nilai rata-rata
        // $name['user'] = user::select('username');
        $name = Auth::user()->username;

        $nilaiDospem = NilaiDosPem::select('username')
        ->sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6')); 
        $rataDospem = round($nilaiDospem, 2);

        $nilaiDospemPerusahaan = NilaiDosPemPerusahaan::
        sum(\DB::raw('(kepribadian + penguasaan_materi + keterampilan + kreatifitas + tanggung_jawab + komunikasi) / 6'));
        $rataDospemPerusahaan = round($nilaiDospemPerusahaan, 2);

        $akhir = ($rataDospemPerusahaan + $rataDospem) / 2;

        if ($akhir <= 39 ) {
			$temp = 'E';
		} else if ($akhir <= 49) {
			$temp = 'D';
		} else if ($akhir <= 59) {
			$temp = 'C';
		} else if ($akhir <= 64) {
			$temp = 'BC';
		} else if ($akhir <= 73) {
            $temp = 'B';
        }
        else if ($akhir <= 79) {
			$temp = 'AB';
        }
        else if ($akhir <= 80) {
			$temp = 'A';
        }

        

    //    $x = NilaiDosPemPerusahaan::table('nilai_dospem_perusahaan')
    //     ->select('kepribadian', 'penguasaan_materi', NilaiDosPemPerusahaan::raw('SUM(column_int_1) AS sum_of_1'))
    //     ->get();
            

        return view('koordinator_kp.dashboard-koordinator-penilaian-kp', $data, ['rataDospem'=>$rataDospem,'rataDospemPerusahaan'=>$rataDospemPerusahaan, 'temp'=>$temp]);
    }

    public function create()
    {
        $data['nilai_koordinator_kp'] = NilaiKoordinatorKP::all();
        return view('koordinator_kp.dashboard-koordinator-tambah-penilaian-kp');
    }

    
}
