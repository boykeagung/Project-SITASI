<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KP;

class KoordinatorKPController extends Controller
{
    //

    public function index()
    {
        $data['kp'] = KP::join('users', 'users.username', '=', 'kp.username')
            ->select('kp.*', 'users.name')
            ->get();
        return view('koordinator_kp.dashboard-koordinator-kp', $data);
    }

    public function create()
    {
        // $data['ta'] = TA::all();
        $data['user'] = User::all()->where('level', 'user');
        $data['user1'] = User::all()->whereIn('level', ['koordinator', 'dosen']);
        return view('koordinator_kp.dashboard-koordinator-tambah-kp', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // 'id_kp' => 'required',
            'username' => 'required',
        ]);

        $input = $request->all();
        $username = $request->input('username');
        $input['username'] = "$username";
        $input['id_kp'] = "KP$username";

        KP::create($input);
        return redirect('dashboard-koordinator-kp');
    }

    public function edit($id)
    {
        $data['kp'] = KP::find($id);
        $data['user'] = User::all()->where('level', 'user');
        $data['user1'] = User::all()->whereIn('level', ['koordinator', 'dosen']);
        return view('koordinator_kp.dashboard-koordinator-edit-sidang-kp', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            // 'id_kp' => 'required',
            'username' => 'required',
        ]);

        $input = $request->all();
        $username = $request->input('username');
        $input['username'] = "$username";
        $input['id_kp'] = "KP$username";

        KP::find($id)->update($input);
        return redirect('koordinator_kp.dashboard-koordinator-kp');
    }

    public function delete($id, Request $request)
    {
        $ta = KP::find($id);
        $ta->delete($request->all());
        return redirect('koordinator_kp.dashboard-koordinator-kp');
    }
}
