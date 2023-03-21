<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TUYudisiumController extends Controller
{
    public function index()
    {
        return view('tata_usaha.dashboard-tata-usaha-yudisium');
    }
}
