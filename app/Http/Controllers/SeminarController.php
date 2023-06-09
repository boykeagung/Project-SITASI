<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SeminarController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->username;
        $data['seminar'] = Seminar::all()->where('id_seminar', '=', "STA$username");
        return view('mahasiswa.dashboard-mahasiswa-seminar-ta', $data);
    }

    public function create()
    {
        $data['seminar'] = Seminar::all();
        return view('mahasiswa.dashboard-mahasiswa-tambah-seminar-ta');
    }

    public function store(Request $request)
    {
        // Seminar::create($request->all());
        // return redirect('dashboard-mahasiswa-seminar-ta');

        try {
            $this->validate($request, [
                'draft' => "mimes:pdf|max:5000",
                // 'judul' => 'required',
                'jurnal' => 'mimes:pdf|max:25000',
                // 'ruangan' => 'required',
                // 'jam_seminar' => 'required',
                // 'tanggal_seminar' => 'required',
            ]);

            $input = $request->all();
            $input['status'] = "Diproses";

            if ($draft = $request->file('draft')) {
                $destinationPath = 'Draft_TA_Seminar/';
                $draftSeminar = time() . "_" . $draft->getClientOriginalName();
                $draft->move($destinationPath, $draftSeminar);
                $input['draft'] = "$draftSeminar";
            }

            if ($jurnal = $request->file('jurnal')) {
                $destinationPath = 'Jurnal_TA/';
                $jurnalName = time() . "_" . $jurnal->getClientOriginalName();
                $jurnal->move($destinationPath, $jurnalName);
                $input['jurnal'] = "$jurnalName";
            }

            // meninggal
            Seminar::create($input);

            return redirect('dashboard-mahasiswa-seminar-ta')->with('success', 'Daftar TA created successfully.');
        } catch (QueryException $e) {
            abort(403, 'ANDA BELUM MENDAFTAR TUGAS AKHIR/DAFTAR SEMINAR HANYA DAPAT SATU KALI!!!.');
            // throw new \Exception('Terjadi kesalahan dalam menjalankan query. Sepertinya Anda belum mendaftar Tugas Akhir  ');
        }
    }

    public function edit($id)
    {
        $data['seminar'] = Seminar::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-seminar-ta', $data);
    }

    public function update($id, Request $request)
    {
        // $ta = Seminar::find($id);
        // $ta->update($request->all());
        // return redirect('dashboard-mahasiswa-seminar-ta');
        $this->validate($request, [
            'draft' => "mimes:pdf|max:5000",
            // 'judul' => 'required',
            'jurnal' => 'mimes:pdf|max:5000',
            // 'ruangan' => 'required',
            // 'jam_seminar' => 'required',
            // 'tanggal_seminar' => 'required',
        ]);

        $input = $request->all();
        $input['status'] = "Diproses";

        if ($draft = $request->file('draft')) {
            $destinationPath = 'Draft_TA_Seminar/';
            $draftSeminar = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftSeminar);
            $input['draft'] = "$draftSeminar";
        } else {
            unset($input['draft']);
        }

        if ($jurnal = $request->file('jurnal')) {
            $destinationPath = 'Jurnal_TA/';
            $jurnalName = time() . "_" . $jurnal->getClientOriginalName();
            $jurnal->move($destinationPath, $jurnalName);
            $input['jurnal'] = "$jurnalName";
        } else {
            unset($input['jurnal']);
        }

        Seminar::find($id)->update($input);

        return redirect('dashboard-mahasiswa-seminar-ta')->with('success', 'Daftar TA created successfully.');
    }

    public function delete($id, Request $request)
    {
        $ta = Seminar::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-mahasiswa-seminar-ta');
    }
}
