<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        // $data['mahasiswa'] = Mahasiswa::all();
        // $username = Auth::user()->username;
        // $data['user'] = User::where('username', '=', $username)->get();
        $data['user'] = User::all()->where('level', 'user');
        return view('koordinator.dashboard-koordinator-ta', $data);
    }
    public function create()
    {
        $data['user'] = User::all();
        // fungsi pluck() ? Singkatnya, fungsi ini sangat berguna untuk
        // penghematan daya dan waktu untuk mengeksekusi query jika yang dibutuhkan
        // hanya salah satu atau dua kolom tertentu.
        // $data['user'] = User::all();
        return view('koordinator.dashboard-koordinator-tambah-data-mahasiswa');
    }

    public function store(Request $request)
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
            $destinationPath = 'Foto_Mahasiswa/';
            $fotoTa = time() . "_" . $foto->getClientOriginalName();
            $foto->move($destinationPath, $fotoTa);
            $input['foto'] = "$fotoTa";
        }

        User::create($input);
        return redirect('dashboard-koordinator-ta');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('koordinator.dashboard-koordinator-edit-data-mahasiswa', $data);
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
            $destinationPath = 'Foto_Mahasiswa/';
            $fotoTa = time() . "_" . $foto->getClientOriginalName();
            $foto->move($destinationPath, $fotoTa);
            $input['foto'] = "$fotoTa";
        } else {
            unset($input['foto']);
        }

        User::find($id)->update($input);
        return redirect('dashboard-koordinator-ta');
    }

    public function delete($id, Request $request)
    {
        $user = User::find($id);
        $user->delete($request->all());
        return redirect('dashboard-koordinator-ta');
    }
}
