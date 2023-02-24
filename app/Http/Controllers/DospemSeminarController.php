<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DospemSeminarController extends Controller
{
    //
    public function index()
    {
        // $data['seminar'] = Seminar::all();
        $username = Auth::user()->username;
        $data['seminar'] = Seminar::join('ta', 'seminar.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->where('ta.pembimbing1', 'like', '%' . $username . '%')
            ->orWhere('ta.pembimbing2', 'like', '%' . $username . '%')
            ->select('seminar.*', 'ta.username', 'users.name')
            ->get();
        return view('dosen_pembimbing_penguji.dashboard-dospem-seminar-ta', $data);
    }

    public function edit($id)
    {
        $data['seminar'] = Seminar::find($id);
        return view('dosen_pembimbing_penguji.dashboard-dospem-edit-seminar-ta', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            // 'komentar1' => 'required',
            // 'status' => 'required',
            // 'jam_sidang' => 'required',
            // 'tanggal_sidang' => 'required',
            // 'proposal' => 'mimes:pdf|max:10000',
        ]);

        $input = $request->all();
        // $id_ta = $request->input('id_ta');
        // $input['id_proposal'] = "$id_ta";
        // $input['id_proposal'] = "P$id_ta";

        // if ($draft = $request->file('proposal')) {
        //     $destinationPath = 'Draft_Proposal_TA/';
        //     $draftTA = $draft->getClientOriginalName();
        //     $draft->move($destinationPath, $draftTA);
        //     $input['proposal'] = "$draftTA";
        // } else {
        //     unset($input['draft']);
        // }

        Seminar::find($id)->update($input);
        return redirect('dashboard-dospem-seminar-ta');
    }
}
