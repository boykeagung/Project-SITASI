<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SidangTA;
use App\Models\TA;
use App\Models\User;
use Illuminate\Http\Request;

class KoordinatorSidangTAController extends Controller
{
    //
    public function index()
    {
        $data['sidang_ta'] = SidangTA::join('ta', 'sidang_ta.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->select('sidang_ta.*', 'users.name', 'ta.username')
            ->get();
        return view('koordinator.dashboard-koordinator-sidang-ta', $data);
    }

    public function create()
    {
        $data['ta'] = TA::join('users', 'users.username', '=', 'ta.username')->select('ta.*', 'users.name')
            ->get();
        // $data['user1'] = User::all()->whereIn('level', ['koordinator', 'dosen']);
        // $data['sidang_ta'] = Mahasiswa_Sidang_TA::all();
        return view('koordinator.dashboard-koordinator-sidang-ta-tambah-data', $data);
    }

    public function storee(Request $req)
    {
        $this->validate($req, [
            // 'id_sidang_ta' => "required",
            // 'id_ta' => 'required',
            'judul' => 'required',
            'buku_ta' => 'required|mimes:pdf|max:10000',
            'ruangan' => 'required',
            'jam_sidang' => 'required',
            'jadwal_sidang' => 'required',
            'status' => 'required'
        ]);
        $input = $req->all();
        $id_ta = $req->input('id_ta');
        $input['id_sidang_ta'] = "$id_ta";
        $input['id_sidang_ta'] = "S$id_ta";
        if ($buku_ta = $req->file('buku_ta')) {
            $destinationPath = 'Draft_Buku_TA/';
            $buku_ta_name = $buku_ta->getClientOriginalName();
            $buku_ta->move($destinationPath, $buku_ta_name);
            $input['buku_ta'] = "$buku_ta_name";
        }

        SidangTA::create($input);

        return redirect('dashboard-koordinator-sidang-ta')->with('success', 'Sidang TA created successfully.');
    }

    public function edit($id)
    {
        $data['sidang_ta'] = SidangTA::find($id);
        $data['ta'] = TA::join('users', 'users.username', '=', 'ta.username')->select('ta.*', 'users.name')
            ->get();
        $data['user1'] = User::all()->whereIn('level', ['koordinator', 'dosen']);
        return view('koordinator.dashboard-koordinator-sidang-ta-edit-data', $data);
    }

    public function update($id, Request $req)
    {
        // $sidang_ta = Mahasiswa_Sidang_TA::find($id);
        // $sidang_ta->update($request->all());
        // return redirect('dashboard-mahasiswa-sidang-ta');

        $this->validate($req, [
            // 'id_sidang_ta' => "required",
            'id_ta' => 'required',
            'judul' => 'required',
            'buku_ta' => 'required|mimes:pdf|max:10000',
            'ruangan' => 'required',
            'jam_sidang' => 'required',
            'jadwal_sidang' => 'required',
            'status' => 'required'
        ]);

        $input = $req->all();
        $username = $req->input('id_ta');
        $input['id_ta'] = "$username";
        $input['id_sidang_ta'] = "SD$username";

        if ($buku_ta = $req->file('buku_ta')) {
            $destinationPath = 'Draft_Buku_TA/';
            $buku_ta_name = $buku_ta->getClientOriginalName();
            $buku_ta->move($destinationPath, $buku_ta_name);
            $input['buku_ta'] = "$buku_ta_name";
        } else {
            unset($input['buku_ta']);
        }
        SidangTA::find($id)->update($input);
        return redirect('dashboard-koordinator-sidang-ta')->with('success', 'Sidang TA edited successfully.');
    }

    public function delete($id, Request $request)
    {
        $sidang_ta = SidangTA::find($id);
        $sidang_ta->delete($request->all());
        return redirect('dashboard-koordinator-sidang-ta');
    }
}