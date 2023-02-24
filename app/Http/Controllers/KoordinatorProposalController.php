<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\TA;
use Illuminate\Http\Request;

class KoordinatorProposalController extends Controller
{
    // 
    public function create()
    {
        // $data['ta'] = Proposal::join('ta', 'proposal.id_ta', '=', 'ta.id_ta')
        //     ->join('users', 'ta.username', '=', 'users.username')
        //     ->select('proposal.*', 'users.name')
        //     ->get();

        $data['ta'] = TA::join('users', 'users.username', '=', 'ta.username')->select('ta.*', 'users.name')
            ->get();
        return view('koordinator.dashboard-koordinator-tambah-proposal-ta', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_ta' => 'required',
            // 'judul' => 'required',
            // 'jam_sidang' => 'required',
            // 'tanggal_sidang' => 'required',
            'proposal' => 'mimes:pdf|max:25000',
        ]);

        $input = $request->all();
        $id_ta = $request->input('id_ta');
        $input['id_proposal'] = "$id_ta";
        $input['id_proposal'] = "P$id_ta";

        if ($draft = $request->file('proposal')) {
            $destinationPath = 'Draft_Proposal_TA/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['proposal'] = "$draftTA";
        }

        Proposal::create($input);
        // Proposal::create($request->all());
        return redirect('dashboard-koordinator-proposal-ta');
    }

    public function edit($id)
    {
        $data['proposal'] = Proposal::find($id);
        $data['ta'] = TA::join('users', 'users.username', '=', 'ta.username')->select('ta.*', 'users.name')
            ->get();;
        return view('koordinator.dashboard-koordinator-edit-proposal-ta', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'id_ta' => 'required',
            // 'judul' => 'required',
            // 'jam_sidang' => 'required',
            // 'tanggal_sidang' => 'required',
            'proposal' => 'mimes:pdf|max:25000',
        ]);

        $input = $request->all();
        $id_ta = $request->input('id_ta');
        $input['id_proposal'] = "$id_ta";
        $input['id_proposal'] = "P$id_ta";

        if ($draft = $request->file('proposal')) {
            $destinationPath = 'Draft_Proposal_TA/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['proposal'] = "$draftTA";
        } else {
            unset($input['draft']);
        }

        Proposal::find($id)->update($input);
        return redirect('dashboard-koordinator-proposal-ta');
    }

    public function delete($id, Request $request)
    {
        $ta = Proposal::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-koordinator-proposal-ta');
    }
}
