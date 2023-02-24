<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Session;
use App\Models\Authentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Yudisium;
use App\Models\Mahasiswa;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function auth(Request $request)
    {
        $username = $request->input('inputUsername');
        $password = $request->input('inputPassword');

        if (Auth::attempt(['username' => $username, 'password' => $password, 'level' => 'tu'])) {
            // Session::regenerate();
            // Session::put('loggedUsername', $username);
            // $loggedUsername = Session::get('loggedUsername');
            return redirect()->intended('dashboard-tata-usaha');
        } elseif (Auth::attempt(['username' => $username, 'password' => $password, 'level' => 'dosen'])) {
            Session::regenerate();
            Session::put('loggedUsername', $username);
            $loggedUsername = Session::get('loggedUsername');
            Dosen::firstOrCreate(['nip' => $loggedUsername]);
            return redirect()->intended('dashboard-dospem-proposal-ta');
        } elseif (Auth::attempt(['username' => $username, 'password' => $password, 'level' => 'koordinator'])) {
            // Session::regenerate();
            // Session::put('loggedUsername', $username);
            // $loggedUsername = Session::get('loggedUsername');
            return redirect()->intended('dashboard-koordinator-ta');
        } elseif (Auth::attempt(['username' => $username, 'password' => $password, 'level' => 'mahasiswa'])) {
            Session::regenerate();
            Session::put('loggedUsername', $username);
            $loggedUsername = Session::get('loggedUsername');
            Mahasiswa::firstOrCreate(['nrp' => $loggedUsername]);
            Yudisium::firstOrCreate(['nrp' => $loggedUsername], ['toga' => 'xs']);
            return redirect()->intended('dashboard-mahasiswa');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}