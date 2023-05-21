<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Models\Dosen;
use App\Models\TA;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TAController extends Controller
{
    //
    public function index1()
    {
        return view('mahasiswa.dashboard-mahasiswa');
    }

    public function index()
    {
        $username = Auth::user()->username;
        $data['ta'] = TA::all()->where('username', '=', $username);
        $data['proposal'] = Proposal::all()->where('id_proposal', '=', "PTA$username");
        // $data['dosen'] = Dosen::all();
        return view('mahasiswa.dashboard-mahasiswa-proposal-ta', $data);

        // $data = DB::table('ta')
        //     ->join('dosen', 'dosen.nip', '=', 'ta.pembimbing1')
        //     ->select('ta.*', 'dosen.nama_lengkap')
        //     ->get();

        // $data['proposal'] = Proposal::all();

        // return view('mahasiswa.dashboard-mahasiswa-proposal-ta', $data);
        // return view('mahasiswa.dashboard-mahasiswa-proposal-ta')->with('ta', $data);

        // $ta = TA::with('ta')->get();
        // $dosen = Dosen::with('dosen')->get();
        // return view('mahasiswa.dashboard-mahasiswa-proposal-ta', compact('ta', 'dosen'));
    }

    public function create()
    {
        $data['user'] = User::all();
        return view('mahasiswa.dashboard-mahasiswa-tambah-ta', $data);
        // $ta = TA::get();
        // return view('mahasiswa.dashboard-mahasiswa-tambah-ta', ['ta' => $ta]);
    }

    public function store(Request $request)
    {

        try {
            $this->validate($request, [
                'draft' => "mimes:pdf|max:25000",
                // 'judul' => 'required',
                'id_ta' => 'required',
                'username' => 'required',
            ]);

            $input = $request->all();

            if ($draft = $request->file('draft')) {
                $destinationPath = 'Draft_TA_Sinopsis/';
                $draftTA = time() . "_" . $draft->getClientOriginalName();
                $draft->move($destinationPath, $draftTA);
                $input['draft'] = "$draftTA";
            }

            TA::create($input);

            return redirect('dashboard-mahasiswa-proposal-ta')->with('success', 'Daftar TA created successfully.');
        } catch (QueryException $e) {
            abort(403, 'Anda hanya dapat mendaftar Tugas Akhir satu kali!. ');
            // throw new \Exception('Terjadi kesalahan dalam menjalankan query. Sepertinya Anda belum mendaftar Tugas Akhir  '); 
        }
    }

    public function edit($id)
    {
        $data['ta'] = TA::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-ta', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'draft' => "mimes:pdf|max:25000",
            // 'judul' => 'required'
        ]);

        $input = $request->all();
        // PDF
        if ($draft = $request->file('draft')) {
            $destinationPath = 'Draft_TA_Sinopsis/';
            $draftTA = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $draftTA);
            $input['draft'] = "$draftTA";
        } else {
            unset($input['draft']);
        }

        TA::find($id)->update($input);

        return redirect('dashboard-mahasiswa-proposal-ta')->with('success', 'Tugas Akhir updated successfully');
    }

    public function delete($id, Request $request)
    {
        $ta = TA::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-mahasiswa-proposal-ta');
    }
}
