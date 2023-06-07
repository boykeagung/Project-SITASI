<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form001;

class KoordinatorKPForm001Controller extends Controller
{
    public function index()
    {
        $data['kp_form001'] = Form001::all();

        return view('koordinator_kp.dashboard-koordinator-form-001', $data);
    }
}
