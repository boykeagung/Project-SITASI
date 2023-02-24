<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use App\Models\TA;
use Illuminate\Http\Request;

class KoordinatorSeminarController extends Controller
{
    //
    public function index()
    {
        $data['seminar'] = Seminar::join('ta', 'seminar.id_ta', '=', 'ta.id_ta')
            ->join('users', 'ta.username', '=', 'users.username')
            ->select('seminar.*', 'users.name', 'ta.username')
            ->get();
        return view('koordinator.dashboard-koordinator-seminar-ta', $data);
    }

    public function create()
    {
        $data['ta'] = TA::join('users', 'users.username', '=', 'ta.username')->select('ta.*', 'users.name')
            ->get();
        return view('koordinator.dashboard-koordinator-tambah-seminar-ta', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_ta' => 'required',
            // 'judul' => 'required',
            'jurnal' => 'mimes:pdf|max:25000',
            // 'jam_seminar' => 'required',
            // 'tanggal_seminar' => 'required',
            'draft' => 'mimes:pdf|max:25000',
        ]);

        $input = $request->all();
        $id_ta = $request->input('id_ta');
        $input['id_seminar'] = "$id_ta";
        $input['id_seminar'] = "S$id_ta";

        if ($jurnal = $request->file('jurnal')) {
            $destinationPath = 'Jurnal_TA/';
            $jurnalTA = time() . "_" . $jurnal->getClientOriginalName();
            $jurnal->move($destinationPath, $jurnalTA);
            $input['jurnal'] = "$jurnalTA";
        }
        if ($draft = $request->file('draft')) {
            $destinationPath = 'Draft_TA_Seminar/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['draft'] = "$draftTA";
        }

        Seminar::create($input);
        return redirect('dashboard-koordinator-seminar-ta');
    }

    public function edit($id)
    {
        $data['seminar'] = Seminar::find($id);
        $data['ta'] = TA::join('users', 'users.username', '=', 'ta.username')->select('ta.*', 'users.name')
            ->get();
        return view('koordinator.dashboard-koordinator-edit-seminar-ta', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'id_ta' => 'required',
            // 'judul' => 'required',
            'jurnal' => 'mimes:pdf|max:25000',
            // 'jam_seminar' => 'required',
            // 'tanggal_seminar' => 'required',
            'draft' => 'mimes:pdf|max:25000',
        ]);

        $input = $request->all();
        $id_ta = $request->input('id_ta');
        $input['id_seminar'] = "$id_ta";
        $input['id_seminar'] = "S$id_ta";

        if ($jurnal = $request->file('jurnal')) {
            $destinationPath = 'Jurnal_TA/';
            $jurnalTA = time() . "_" . $jurnal->getClientOriginalName();
            $jurnal->move($destinationPath, $jurnalTA);
            $input['jurnal'] = "$jurnalTA";
        } else {
            unset($input['jurnal']);
        }
        if ($draft = $request->file('draft')) {
            $destinationPath = 'Draft_TA_Seminar/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['draft'] = "$draftTA";
        } else {
            unset($input['draft']);
        }

        Seminar::find($id)->update($input);
        return redirect('dashboard-koordinator-seminar-ta');
    }

    public function delete($id, Request $request)
    {
        $ta = Seminar::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-koordinator-seminar-ta');
    }
}
