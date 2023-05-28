<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\bimbingan_ta;

class DospemBimbinganTAController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['proposal'] = bimbingan_ta::join('ta', 'bimbingan_ta.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->where('ta.pembimbing1', 'like', '%' . $username . '%')
            ->orWhere('ta.pembimbing2', 'like', '%' . $username . '%')
            ->select('proposal.*', 'ta.username', 'users.name')
            ->get();
        return view('dosen_pembimbing_penguji.dashboard-dospem-proposal-ta', $data);
    }
}
