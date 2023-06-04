<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa_Residensi;

class Dosen_Residensi extends Controller
{
    public function indexDospem()
    {
        $data['residensi'] = Mahasiswa_Residensi::join('ta', 'residensi.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->select('residensi.*', 'ta.username', 'users.name')
            ->get();
        return view('dosen.dashboard-dospem-residensi-ta', $data);
    }

    public function indexDospeng()
    {
        $data['residensi'] = Mahasiswa_Residensi::join('ta', 'residensi.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->select('residensi.*', 'ta.username', 'users.name')
            ->get();
        return view('dosen.dashboard-dospenguji-residensi-ta', $data);
    }
}
