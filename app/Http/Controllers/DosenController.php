<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $data['user'] = User::all()->where('level', '!=', 'user');
        return view('koordinator.dashboard-koordinator-ta-dosen', $data);
    }

    public function create()
    {
        // fungsi pluck() ? Singkatnya, fungsi ini sangat berguna untuk
        // penghematan daya dan waktu untuk mengeksekusi query jika yang dibutuhkan
        // hanya salah satu atau dua kolom tertentu.

        return view('koordinator.dashboard-koordinator-tambah-data-dosen');
    }

    public function store(Request $request)
    {
        // penggunaan pluck() dan all() yang mana keduanya memiliki fungsi
        // yang sama untuk mengambil data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'mimes:jpeg,jpg,png,gif|max:3000',
        ]);

        $input = $request->all();
        $password = bcrypt($request->input('password'));
        // $password = $request;
        $input['password'] = "$password";
        // $token =  Str::random(60);
        // $input['remember_token'] = $token;


        if ($foto = $request->file('foto')) {
            $destinationPath = 'Foto_dosen/';
            $fotoTa = time() . "_" . $foto->getClientOriginalName();
            $foto->move($destinationPath, $fotoTa);
            $input['foto'] = "$fotoTa";
        }

        User::create($input);
        return redirect('dashboard-koordinator-ta-dosen');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('koordinator.dashboard-koordinator-edit-data-dosen', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'mimes:jpeg,jpg,png,gif|max:3000',
        ]);

        $input = $request->all();
        $password = bcrypt($request->input('password'));
        // $password = $request;
        $input['password'] = "$password";
        // $token =  Str::random(60);
        // $input['remember_token'] = $token;


        if ($foto = $request->file('foto')) {
            $destinationPath = 'Foto_dosen/';
            $fotoTa = time() . "_" . $foto->getClientOriginalName();
            $foto->move($destinationPath, $fotoTa);
            $input['foto'] = "$fotoTa";
        } else {
            unset($input['foto']);
        }

        User::find($id)->update($input);
        return redirect('dashboard-koordinator-ta-dosen');
    }

    public function delete($id, Request $request)
    {
        $user = User::find($id);
        $user->delete($request->all());
        return redirect('dashboard-koordinator-ta-dosen');
    }
}