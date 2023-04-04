<?php

namespace App\Http\Controllers;

use App\Models\bimbingan_ta;
use Illuminate\Http\Request;
use App\Models\TA;

class KoordinatorBimbinganTA extends Controller
{
    //
    public function index()
    {
        $data['bimbingan_ta'] = bimbingan_ta::join('ta', 'bimbingan_ta.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->select('bimbingan_ta.*', 'users.name', 'ta.username')
            ->get();
        return view('koordinator.dashboard-koordinator-bimbingan-ta', $data);
    }

    public function create()
    {
        $data['ta'] = TA::join('users', 'users.username', '=', 'ta.username')->select('ta.*', 'users.name')
            ->get();
        return view('koordinator.dashboard-koordinator-tambah-bimbingan-ta', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $id_ta = $request->input('id_ta');
        // $input['id_seminar'] = "$id_ta";
        $input['id_bta'] = "B$id_ta";
        bimbingan_ta::create($input);
        return redirect('dashboard-koordinator-bimbingan-ta');
    }

    public function edit($id)
    {
        $data['bimbingan_ta'] = bimbingan_ta::find($id);
        $data['ta'] = TA::join('users', 'users.username', '=', 'ta.username')->select('ta.*', 'users.name')
            ->get();
        return view('koordinator.dashboard-koordinator-edit-bimbingan-ta', $data);
    }

    public function update($id, Request $request)
    {

        $input = $request->all();
        $id_ta = $request->input('id_ta');
        $input['id_bta'] = "B$id_ta";

        bimbingan_ta::find($id)->update($input);
        return redirect('dashboard-koordinator-bimbingan-ta');
    }

    public function delete($id, Request $request)
    {
        $ta = bimbingan_ta::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-koordinator-bimbingan-ta');
    }
}
