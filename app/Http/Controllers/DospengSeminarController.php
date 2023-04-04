<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seminar;

class DospengSeminarController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['seminar'] = Seminar::join('ta', 'seminar.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->where('ta.penguji1', 'like', '%' . $username . '%')
            ->orWhere('ta.penguji2', 'like', '%' . $username . '%')
            ->select('seminar.*', 'ta.username', 'users.name')
            ->get();
        return view('dosen_pembimbing_penguji.dashboard-dospenguji-seminar-ta', $data);
    }

    public function edit($id)
    {
        $data['seminar'] = Seminar::join('ta', 'seminar.id_ta', '=', 'ta.id_ta')
            ->select('seminar.*', 'ta.penguji1')
            ->find($id);
        return view('dosen_pembimbing_penguji.dashboard-dospenguji-edit-seminar-ta', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            // 'komentar2' => 'required',
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
        return redirect('dashboard-dospenguji-seminar-ta');
    }
}
