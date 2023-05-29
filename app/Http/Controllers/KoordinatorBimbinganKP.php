<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan_kp;
use Illuminate\Http\Request;
use App\Models\TA;
use App\Models\KP;

class KoordinatorBimbinganKP extends Controller
{
    //
    public function index()
    {
        $data['bimbingan_kp'] = Bimbingan_kp::join('kp', 'bimbingan_kp.id_kp', '=', 'kp.id_kp')
            ->join('users', 'kp.username', '=', 'users.username')
            ->select('bimbingan_kp.*', 'users.name', 'kp.username')
            ->get();
        return view('koordinator_kp.dashboard-koordinator-bimbingan-kp', $data);
    }

    public function create()
    {
        $data['bimbingan_kp'] = KP::join('users', 'users.username', '=', 'kp.username')->select('kp.*', 'users.name')
            ->get();
        return view('koordinator_kp.dashboard-koordinator-tambah-bimbingan-kp', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $id_kp = $request->input('id_kp');
        // $input['id_seminar'] = "$id_ta";
        $input['id_bkp'] = "B$id_kp";
        Bimbingan_kp::create($input);
        return redirect('dashboard-koordinator-bimbingan-kp');
    }

    public function edit($id)
    {
        $data['bimbingan_kp'] = Bimbingan_kp::find($id);
        $data['ta'] = KP::join('users', 'users.username', '=', 'kp.username')->select('kp.*', 'users.name')
            ->get();
        return view('koordinator_kp.dashboard-koordinator-edit-bimbingan-kp', $data);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        Bimbingan_kp::find($id)->update($input);
        return redirect('dashboard-koordinator-bimbingan-kp');
    }

    public function delete($id, Request $request)
    {
        $ta = Bimbingan_kp::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-koordinator-bimbingan-kp');
    }
}
