<?php

namespace App\Http\Controllers;

use App\Models\Authentication;
// use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function loginMahasiswa()
    {
        return view('login.login-mahasiswa');
    }

    public function loginKoordinator()
    {
        return view('login.login-koordinator');
    }

    public function loginKoordinatorKP()
    {
        return view('login.login-koordinator-kp');
    }

    public function loginDosen()
    {
        return view('login.login-dosen');
    }

    public function loginTU()
    {
        return view('login.login-tu');
    }

    public function LoginKoordinatorYudisium()
    {
     return view('login.login-koordinator-yudisium');
    }

    public function PostLoginKoordinatorYudisium(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session('')->regenerate();

            return redirect()->intended('dashboard-koordinator-yudisium');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
    
    public function postLoginMahasiswa(Request $request)
    {

        // if (Auth::attempt($request->only('username', 'password'))) {
        //     return redirect('dashboard-mahasiswa');
        // }
        // return view('login-mahasiswa');

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session('')->regenerate();

            return redirect()->intended('dashboard-mahasiswa');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function PostLoginKoordinator(Request $request)
    {

        // if (Auth::attempt($request->only('username', 'password'))) {
        //     return redirect('dashboard-mahasiswa');
        // }
        // return view('login-mahasiswa');

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session('')->regenerate();

            return redirect()->intended('dashboard-koordinator-ta');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function PostLoginKoordinatorKP(Request $request)
    {

        // if (Auth::attempt($request->only('username', 'password'))) {
        //     return redirect('dashboard-mahasiswa');
        // }
        // return view('login-mahasiswa');

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session('')->regenerate();

            return redirect()->intended('dashboard-koordinator-kp');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function PostLoginDosen(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session('')->regenerate();

            return redirect()->intended('dashboard-dospem-proposal-ta');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function PostLoginTu(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session('')->regenerate();

            return redirect()->intended('dashboard-tata-usaha');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}