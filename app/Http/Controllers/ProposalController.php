<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\TA;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    //
    // public function index()
    // {
    //     $data['proposal'] = Proposal::all();
    //     return view('mahasiswa.dashboard-mahasiswa-proposal-ta', $data);
    // }

    public function create()
    {
        $data['ta'] = TA::all();
        return view('mahasiswa.dashboard-mahasiswa-tambah-proposal-ta', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'proposal' => "mimes:pdf|max:25000",
            // 'judul' => 'required',
            // 'ruangan' => 'required',
            // 'jam_sidang' => 'required',
            // 'tanggal_sidang' => 'required',
            // 'ruangan' => 'required',
        ]);

        $input = $request->all();
        // $status = $request->input('status');
        $input['status'] = "Diproses";

        if ($proposal = $request->file('proposal')) {
            $destinationPath = 'Draft_Proposal_TA/';
            $proposalName = time() . "_" . $proposal->getClientOriginalName();
            $proposal->move($destinationPath, $proposalName);
            $input['proposal'] = "$proposalName";
        }

        Proposal::create($input);

        return redirect('dashboard-mahasiswa-proposal-ta')->with('success', 'Daftar Proposal created successfully.');


        // Proposal::create($request->all());
        // return redirect('dashboard-mahasiswa-proposal-ta');
    }

    public function edit($id)
    {
        $data['proposal'] = Proposal::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-proposal-ta', $data);
    }

    public function update($id, Request $request)
    {
        // $ta = Proposal::find($id);
        // $ta->update($request->all());
        $this->validate($request, [
            'proposal' => "mimes:pdf|max:5000",
            // 'judul' => 'required',
            // 'ruangan' => 'required',
            // 'jam_sidang' => 'required',
            // 'tanggal_sidang' => 'required',
            // 'ruangan' => 'required',
        ]);

        $input = $request->all();
        $input['status'] = "Diproses";

        if ($proposal = $request->file('proposal')) {
            $destinationPath = 'Draft_Proposal_TA/';
            $proposalName = time() . "_" . $proposal->getClientOriginalName();
            $proposal->move($destinationPath, $proposalName);
            $input['proposal'] = "$proposalName";
        } else {
            unset($input['proposal']);
        }

        Proposal::find($id)->update($input);

        return redirect('dashboard-mahasiswa-proposal-ta')->with('success', 'Tugas Akhir updated successfully');
    }

    public function delete($id, Request $request)
    {
        $ta = Proposal::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-mahasiswa-proposal-ta');
    }
}
