<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KP;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\sidang_kp;

class KoordinatorSidangKPController extends Controller
{
    //
    public function index()
    {
        $data['sidang_kp'] = sidang_kp::join('kp', 'kp.id_kp', '=', 'sidang_kp.id_kp')
            ->join('users', 'users.username', '=', 'kp.username')
            ->select('sidang_kp.*', 'users.name', 'users.username')
            ->get();
        return view('koordinator_kp.dashboard-koordinator-sidang-kp', $data);
    }

    public function create()
    {
        // $data['ta'] = TA::all();
        $data['kp'] = KP::join('users', 'users.username', '=', 'kp.username')->select('kp.*', 'users.name')
            ->get();
        $data['user1'] = User::all()->whereIn('level', ['koordinator', 'dosen']);
        return view('koordinator_kp.dashboard-koordinator-tambah-sidang-kp', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'laporan' => "mimes:pdf|max:10000",
            'id_kp' => 'required',
            'nilai' => "mimes:pdf|max:25000",
        ]);

        $input = $request->all();
        $username = $request->input('id_kp');
        $input['id_kp'] = "$username";
        $input['id_sidang_kp'] = "S$username";

        if ($draft = $request->file('laporan')) {
            $destinationPath = 'Laporan_KP/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['laporan'] = "$draftTA";
        }

        if ($draft = $request->file('nilai')) {
            $destinationPath = 'Nilai_KP/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['nilai'] = "$draftTA";
        }

        sidang_kp::create($input);
        return redirect('dashboard-koordinator-sidang-kp');
    }

    public function edit($id)
    {
        $data['sidang_kp'] = sidang_kp::find($id);
        $data['kp'] = KP::join('users', 'users.username', '=', 'kp.username')->select('kp.*', 'users.name')
            ->get();
        $data['user1'] = User::all()->whereIn('level', ['koordinator', 'dosen']);
        return view('koordinator_kp.dashboard-koordinator-edit-sidang-kp', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'laporan' => "mimes:pdf|max:25000",
            'id_kp' => 'required',
            'nilai' => "mimes:pdf|max:25000",
        ]);

        $input = $request->all();
        $username = $request->input('id_kp');
        $input['id_kp'] = "$username";
        $input['id_sidang_kp'] = "S$username";

        if ($draft = $request->file('laporan')) {
            $destinationPath = 'Laporan_KP/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['laporan'] = "$draftTA";
        } else {
            unset($input['laporan']);
        }

        if ($draft = $request->file('nilai')) {
            $destinationPath = 'Nilai_KP/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['nilai'] = "$draftTA";
        } else {
            unset($input['nilai']);
        }

        sidang_kp::find($id)->update($input);
        return redirect('dashboard-koordinator-sidang-kp');
    }

    public function delete($id, Request $request)
    {
        $ta = sidang_kp::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-koordinator-sidang-kp');
    }
}
