<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\sidang_kp;

class DospemSidangKPController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['sidang_kp'] = sidang_kp::join('kp', 'sidang_kp.id_kp', '=', 'kp.id_kp')
            ->join('users', 'kp.username', '=', 'users.username')
            ->where('kp.pembimbing_kp', 'like', '%' . $username . '%')
            ->select('sidang_kp.*', 'kp.username', 'users.name')
            ->get();
        return view('dosen_pembimbing_penguji.dashboard-dospem-sidang-kp', $data);
    }

    public function edit($id)
    {
        $data['sidang_kp'] = sidang_kp::find($id);
        return view('dosen_pembimbing_penguji.dashboard-dospem-edit-sidang-kp', $data);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        sidang_kp::find($id)->update($input);
        return redirect('dashboard-dospem-sidang-kp');
    }
}
