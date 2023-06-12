<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seminar;
use App\Models\sidang_kp;
use App\Models\Proposal;
use App\Models\SidangTA;

class TUProposalSeminarSidangController extends Controller
{
    public function indexProposal()
    {
        $data['proposal'] = Proposal::join('ta', 'proposal.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->select('proposal.*', 'ta.username', 'users.name')
            ->get();
        return view('tata_usaha.dashboard-tata-usaha-proposal-ta', $data);
    }

    public function indexSeminar()
    {
        $data['seminar'] = Seminar::join('ta', 'seminar.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->select('seminar.*', 'ta.username', 'users.name')
            ->get();
        return view('tata_usaha.dashboard-tata-usaha-seminar-ta', $data);
    }

    public function indexSidangKP()
    {
        $data['sidang_kp'] = sidang_kp::join('kp', 'sidang_kp.id_kp', '=', 'kp.id_kp')
            ->join('users', 'kp.username', '=', 'users.username')
            ->select('sidang_kp.*', 'kp.username', 'users.name')
            ->get();
        return view('tata_usaha.dashboard-tata-usaha-sidang-kp', $data);
    }

    public function indexSidanGTA()
    {
        $data['sidang_ta'] = SidangTA::join('ta', 'sidang_ta.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->select('sidang_ta.*', 'ta.username', 'users.name')
            ->get();
        return view('tata_usaha.dashboard-tu-sidang-ta', $data);
    }

    //test
    public function sidangkptest($id)
    {
        $data['sidang_kp'] = sidang_kp::find($id);
        return view('tata_usaha.sidang-kp-test', $data);
    }
}
