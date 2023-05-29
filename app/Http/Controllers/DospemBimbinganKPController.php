<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan_kp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DospemBimbinganKPController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['bimbingan_kp'] = Bimbingan_kp::join('kp', 'bimbingan_kp.id_kp', '=', 'kp.id_kp')
            ->join('users', 'kp.username', '=', 'users.username')
            ->where('kp.pembimbing_kp', 'like', '%' . $username . '%')
            ->select('bimbingan_kp.*', 'kp.username', 'users.name')
            ->get();
        return view('dosen_pembimbing_penguji.dashboard-dospem-bimbingan-kp', $data);
    }

    public function edit($id)
    {
        $data['bimbingan_kp'] = Bimbingan_kp::find($id);
        return view('dosen_pembimbing_penguji.dashboard-dospem-edit-bimbingan-kp', $data);
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
        Bimbingan_kp::find($id)->update($input);
        return redirect('dashboard-dospem-bimbingan-kp');
    }
}
