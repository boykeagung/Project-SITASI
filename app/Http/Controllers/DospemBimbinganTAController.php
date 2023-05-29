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
        $data['bimbingan_ta'] = bimbingan_ta::join('ta', 'bimbingan_ta.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->where('ta.pembimbing1', 'like', '%' . $username . '%')
            ->orWhere('ta.pembimbing2', 'like', '%' . $username . '%')
            ->select('bimbingan_ta.*', 'ta.username', 'users.name')
            ->get();
        return view('dosen_pembimbing_penguji.dashboard-dospem-bimbingan-ta', $data);
    }

    public function edit($id)
    {
        $data['bimbingan_ta'] = bimbingan_ta::find($id);
        return view('dosen_pembimbing_penguji.dashboard-dospem-edit-bimbingan-ta', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            // 'komentar1' => 'required',
            // 'status' => 'required',
            // 'jam_sidang' => 'required',
            // 'tanggal_sidang' => 'required',
            // 'proposal' => 'mimes:pdf|max:10000',
        ]);

        $input = $request->all();
        bimbingan_ta::find($id)->update($input);
        return redirect('dashboard-dospem-bimbingan-ta');
    }
}
