<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\sidang_kp;

class DospengSidangKPController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['sidang_kp'] = sidang_kp::join('kp', 'sidang_kp.id_kp', '=', 'kp.id_kp')
            ->join('users', 'kp.username', '=', 'users.username')
            ->where('sidang_kp.penguji1', 'like', '%' . $username . '%')
            ->orWhere('sidang_kp.penguji1', 'like', '%' . $username . '%')
            ->select('sidang_kp.*', 'kp.username', 'users.name')
            ->get();
        return view('dosen_pembimbing_penguji.dashboard-dospenguji-sidang-kp', $data);
    }

    public function edit($id)
    {
        $data['sidang_kp'] = sidang_kp::find($id);
        return view('dosen_pembimbing_penguji.dashboard-dospenguji-edit-sidang-kp', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nilai' => 'mimes:pdf|max:25000',
            // 'status' => 'required',
            // 'jam_sidang' => 'required',
            // 'tanggal_sidang' => 'required',
            // 'proposal' => 'mimes:pdf|max:10000',
        ]);

        $input = $request->all();

        if ($draft = $request->file('nilai')) {
            $destinationPath = 'Nilai_KP/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['nilai'] = "$draftTA";
        } else {
            unset($input['nilai']);
        }

        sidang_kp::find($id)->update($input);
        return redirect('dashboard-dospenguji-sidang-kp');
    }
}
