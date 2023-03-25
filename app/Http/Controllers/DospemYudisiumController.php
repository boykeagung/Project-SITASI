<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DospemYudisiumController extends Controller
{
    public function index()
    {
        return view('koordinator_yudisium.dashboard-dosen-yudisium');
    }

}