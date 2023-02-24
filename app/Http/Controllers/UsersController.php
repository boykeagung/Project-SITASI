<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data['user'] = user::all()->where('level', '=', 'user');
        return view('tata_usaha.dashboard-tata-usaha', $data);
    }
    public function create()
    {
        // fungsi pluck() ? Singkatnya, fungsi ini sangat berguna untuk
        // penghematan daya dan waktu untuk mengeksekusi query jika yang dibutuhkan
        // hanya salah satu atau dua kolom tertentu.
        $data['user'] = user::all();
        return view('tata_usaha.dashboard-tata-usaha-tambah-data-mahasiswa');
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
            'foto' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $input = $request->all();
        $password = bcrypt($request->input('password'));
        // $password = $request;
        $input['password'] = "$password";
        // $token =  Str::random(60);
        // $input['remember_token'] = $token;


        if ($foto = $request->file('foto')) {
            $destinationPath = 'Foto_Mahasiswa/';
            $fotoTa = $foto->getClientOriginalName();
            $foto->move($destinationPath, $fotoTa);
            $input['foto'] = "$fotoTa";
        }

        User::create($input);
        return redirect('dashboard-tata-usaha');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('tata_usaha.dashboard-tata-usaha-edit-data-mahasiswa', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $input = $request->all();
        $password = bcrypt($request->input('password'));
        // $password = $request;
        $input['password'] = "$password";
        // $token =  Str::random(60);
        // $input['remember_token'] = $token;


        if ($foto = $request->file('foto')) {
            $destinationPath = 'Foto_Mahasiswa/';
            $fotoTa = $foto->getClientOriginalName();
            $foto->move($destinationPath, $fotoTa);
            $input['foto'] = "$fotoTa";
        } else {
            unset($input['foto']);
        }

        User::find($id)->update($input);
        return redirect('dashboard-tata-usaha');
    }

    public function delete($id, Request $request)
    {
        $user = user::find($id);
        $user->delete($request->all());
        return redirect('tata_usaha.dashboard-tata-usaha');
    }
}
