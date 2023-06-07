<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['user'] = User::all()->where('username', '=', "$username");
        return view('profile', $data);
    }
}
