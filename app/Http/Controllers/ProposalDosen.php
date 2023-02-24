<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalDosen extends Controller
{
    public function create()
    {
        $data['proposal'] = Proposal::all();
        return view('mahasiswa.dashboard-dospem-proposal-ta');
    }
}
