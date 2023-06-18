<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\TA;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;

class KoordinatorTAController extends Controller
{
    //
    public function index()
    {
        $data['ta'] = TA::leftJoin('users', 'users.username', '=', 'ta.username')
            ->select('ta.*', 'users.name')
            ->get();
            
        $data['proposal'] = Proposal::join('ta', 'proposal.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->select('proposal.*', 'users.name', 'ta.username')
            ->get();
        return view('koordinator.dashboard-koordinator-proposal-ta', $data);
    }

    public function create()
    {
        // $data['ta'] = TA::all();
        $data['user'] = User::all()->where('level', 'user');
        $data['user1'] = User::all()->whereIn('level', ['koordinator', 'dosen']);
        return view('koordinator.dashboard-koordinator-tambah-ta', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            // 'pembimbing1' => 'required',
            // 'pembimbing2' => 'required',
            // 'penguji1' => 'required',
            // 'penguji2' => 'required',
            // 'judul' => 'required',
            'draft' => 'mimes:pdf|max:25000',
        ]);

        $input = $request->all();
        $username = $request->input('username');
        $input['username'] = "$username";
        $input['id_ta'] = "TA$username";

        if ($draft = $request->file('draft')) {
            $destinationPath = 'Draft_TA_Sinopsis/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['draft'] = "$draftTA";
        }

        TA::create($input);
        return redirect('dashboard-koordinator-proposal-ta');
    }

    public function edit($id)
    {
        $data['ta'] = TA::find($id);
        $data['user'] = User::all()->where('level', 'user');
        $data['user1'] = User::all()->whereIn('level', ['koordinator', 'dosen']);
        return view('koordinator.dashboard-koordinator-edit-ta', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            // 'pembimbing1' => 'required',
            // 'pembimbing2' => 'required',
            // 'penguji1' => 'required',
            // 'penguji2' => 'required',
            // 'judul' => 'required',
            'draft' => 'mimes:pdf|max:25000',
        ]);

        $input = $request->all();
        $username = $request->input('username');
        $input['username'] = "$username";
        $input['id_ta'] = "TA$username";

        if ($draft = $request->file('draft')) {
            $destinationPath = 'Draft_TA_Sinopsis/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['draft'] = "$draftTA";
        } else {
            unset($input['draft']);
        }

        TA::find($id)->update($input);
        return redirect('dashboard-koordinator-proposal-ta');
    }

    public function delete($id, Request $request)
    {
        $ta = TA::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-koordinator-proposal-ta');
    }
}
