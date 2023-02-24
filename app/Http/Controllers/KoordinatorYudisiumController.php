<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoordinatorYudisiumController extends Controller
{
    public function index()
    {
        return view('koordinator_yudisium.dashboard-koordinator-yudisium');
    }
}
