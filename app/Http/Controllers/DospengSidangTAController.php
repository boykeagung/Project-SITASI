<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SidangTA;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DospengSidangTAController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['sidang_ta'] = SidangTA::join('ta', 'sidang_ta.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->where('ta.penguji1', 'like', '%' . $username . '%')
            ->orWhere('ta.penguji2', 'like', '%' . $username . '%')
            ->select('sidang_ta.*', 'ta.username', 'users.name')
            ->get();
        return view('dosen_pembimbing_penguji.dashboard-dospeng-sidang-ta', $data);
    }

    // public function create()
    // {
    //     $data['sidang_ta'] = SidangTA::all();
    //     return view('dosen_pembimbing_penguji.dashboard-dospeng-sidang-ta');
    // }

    // public function storee(Request $req)
    // {
    //     $this->validate($req, [
    //         // 'id_sidang_ta' => "required",
    //         // 'id_ta' => 'required',
    //         'judul' => 'required',
    //         //'buku_ta' => 'required|mimes:pdf|max:10000',
    //         'ruangan' => 'required',
    //         'jam_sidang' => 'required',
    //         'jadwal_sidang' => 'required',
    //         // 'status' => 'required'
    //     ]);
    //     $input = $req->all();
    //     $input['status'] = "Diproses";
    //     if ($buku_ta = $req->file('buku_ta')) {
    //         $destinationPath = 'Draft_Buku_TA/';
    //         $buku_ta_name = $buku_ta->getClientOriginalName();
    //         $buku_ta->move($destinationPath, $buku_ta_name);
    //         $input['buku_ta'] = "$buku_ta_name";
    //     }

    //     SidangTA::create($input);

    //     return redirect('dosen_pembimbing_penguji.dashboard-dospeng-sidang-ta')->with('success', 'Sidang TA created successfully.');
    // }

    public function edit($id)
    {
        $data['sidang_ta'] = SidangTA::find($id);
        return view('dosen_pembimbing_penguji.dashboard-dospeng-sidang-ta-edit-data', $data);
    }

    public function update($id, Request $req)
    {
        $this->validate($req, [
            
        ]);

        $input = $req->all();

        SidangTA::find($id)->update($input);
        return redirect('dashboard-dospeng-sidang-ta');
    }

    public function delete($id, Request $request)
    {
        $sidang_ta = SidangTA::find($id);
        $sidang_ta->delete($request->all());
        return redirect('dosen_pembimbing_penguji.dashboard-dospeng-sidang-ta');
    }
}
