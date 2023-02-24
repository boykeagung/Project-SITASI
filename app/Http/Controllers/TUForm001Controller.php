<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Form001;
use Barryvdh\DomPDF\Facade\Pdf;

class TUForm001Controller extends Controller
{

    public function index()
    {
        $username = Auth::user()->username;
        $data['kp_form001'] = Form001::all();
        $data['file_pdf'] = Form001::all();
        return view('tata_usaha.dashboard-tata-usaha-form-001', $data);


        // $username = Auth::user()->username;
        // $data['kp_form001'] = Form001::all()->where('username', '=', $username);
        // $data['file_pdf'] = Form001::all()->where('username', '=', $username);

        // $medias = Media::orderBy('created_at', 'DESC')->get();

        // return view('mahasiswa.dashboard-mahasiswa-form-001', $data);
    }

    public function edit($id)
    {
        $data['kp_form001'] = Form001::find($id);
        return view('tata_usaha.dashboard-tata-usaha-edit-form-001', $data);
    }

    public function update($id, Request $request)
    {
       
        $this->validate($request, [
            'surat' => "mimes:pdf|max:5000",
        ]);

        $input = $request->all();
        $input['status'] = "Diproses";

        if ($suratPengantar = $request->file('surat')) {
            $destinationPath = 'Surat_Pengantar/';
            $suratWaktu = time() . "_" . $suratPengantar->getClientOriginalName();
            $suratPengantar->move($destinationPath, $suratWaktu);
            $input['surat'] = "$suratWaktu";
        } else {
            unset($input['surat']);
        }

        Form001::find($id)->update($input);
        return redirect('dashboard-tata-usaha-form-001')->with('success', 'Daftar KP created successfully.');
    }


    public function indexForm001()
    {
        $data['kp_form001'] = Form001::
            select('username', 'nama' ,'perusahaan1', 'perusahaan2', 'alamat_perusahaan1', 'bidang_perusahaan1')
            ->get();
        return view('tata_usaha.dashboard-tata-usaha-form-001', $data);
    }

   

}
