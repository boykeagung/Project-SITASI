<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Form001;

use Barryvdh\DomPDF\Facade\Pdf;

class Form001Controller extends Controller
{
    //

    public function index()
    {
        // $username = Auth::user()->username;
        // $data['kp_form001'] = Form001::all()->where('username', '=', $username);
        // return view('mahasiswa.dashboard-mahasiswa-form-001', $data);

        $username = Auth::user()->username;
        $data['kp_form001'] = Form001::all()->where('username', '=', $username);
        $data['file_pdf'] = Form001::all()->where('username', '=', $username);

        // $medias = Media::orderBy('created_at', 'DESC')->get();

        return view('mahasiswa.dashboard-mahasiswa-form-001', $data);

        // $username = Auth::user()->username;
        // $data['seminar'] = Seminar::all()->where('id_seminar', '=', "STA$username");
        // return view('mahasiswa.dashboard-mahasiswa-seminar-ta', $data);
    }

    public function create()
    {
        return view('mahasiswa.dashboard-mahasiswa-tambah-form-001');
        // $ta = TA::get();
        // return view('mahasiswa.dashboard-mahasiswa-tambah-ta', ['ta' => $ta]);
    }

    public function create2()
    {
        return view('mahasiswa.dashboard-mahasiswa-tambah-file');
        // $ta = TA::get();
        // return view('mahasiswa.dashboard-mahasiswa-tambah-ta', ['ta' => $ta]);
    }
    

    public function store(Request $request)
    {
        $this->validate($request, [

            'username' => 'required',
            'file' => "mimes:pdf|max:25000",
        ]);

        $input = $request->all();

        if ($draft = $request->file('draft')) {
            $destinationPath = 'Form_001/';
            $form001KP = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $form001KP);
            $input['draft'] = "$form001KP";
        }

        Form001::create($input);

        return redirect('dashboard-mahasiswa-form-001')->with('success', 'Daftar Proposal created successfully.');
    }


    public function store2(Request $request)
    {
        $this->validate($request, [

            'file' => "mimes:pdf|max:25000",
        ]);

        $input = $request->all();

        if ($draft = $request->file('draft')) {
            $destinationPath = 'Form_001/';
            $form001KP = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $form001KP);
            $input['draft'] = "$form001KP";
        }

        Form001::create($input);

        return redirect('dashboard-mahasiswa-form-001')->with('success', 'Daftar Proposal created successfully.');
    }

    public function edit($id)
    {
        $data['kp_form001'] = Form001::find($id);
        return view('mahasiswa.dashboard-mahasiswa-edit-form-001', $data);
    }

    public function edit2($id)
    {
        $data['kp_form001'] = Form001::find($id);
        return view('mahasiswa.dashboard-mahasiswa-tambah-file', $data);
    }

    public function update($id, Request $request)
    {
        // $ta = Seminar::find($id);
        // $ta->update($request->all());
        // return redirect('dashboard-mahasiswa-seminar-ta');
        $this->validate($request, [
            'pdf_form001' => "mimes:pdf|max:5000",

            // 'id_kp' => 'required',
            // 'username' => 'required',
        ]);

        $input = $request->all();
        $input['status'] = "Diproses";

        if ($draft = $request->file('pdf_form001')) {
            $destinationPath = 'Form_001/';
            $form001KP = time() . "_" . $draft->getClientOriginalName();
            $draft->move($destinationPath, $form001KP);
            $input['pdf_form001'] = "$form001KP";
        } else {
            unset($input['pdf_form001']);
        }

        Form001::find($id)->update($input);
        return redirect('dashboard-mahasiswa-form-001')->with('success', 'Daftar KP created successfully.');
    }

    public function tambahFile($id, Request $request)
    {
        // $ta = Seminar::find($id);
        // $ta->update($request->all());
        // return redirect('dashboard-mahasiswa-seminar-ta');
        $this->validate($request, [

            // 'id_kp' => 'required',
            // 'username' => 'required',
        ]);

        $input = $request->all();
        // $input['status'] = "Diproses";

        Form001::find($id)->update($input);

        return redirect('dashboard-mahasiswa-form-001')->with('success', 'Daftar KP created successfully.');
    }

    public function delete($id, Request $request)
    {
        $ta = Form001::find($id);
        $ta->delete($request->all());
        return redirect('dashboard-mahasiswa-form-001');
    }

    //TU-Form-001

    // public function indexForm001()
    // {
    //     $data['kp_form001'] = Form001::
    //         select('username', 'nama' ,'perusahaan1', 'alamat_perusahaan1', 'bidang_perusahaan1','perusahaan2', 'alamat_perusahaan2', 'bidang_perusahaan2')
    //         ->get();
    //     return view('tata_usaha.dashboard-tata-usaha-form-001', $data);
    // }

    public function generateForm001($id)
    {
        // $data['kp_form001'] = Form001::latest()->first()
        //     ->select('username', 'nama' ,'perusahaan1', 'alamat_perusahaan1', 'bidang_perusahaan1','perusahaan2', 'alamat_perusahaan2', 'bidang_perusahaan2')
        //     ->get($id);
        // $pdf = PDF::loadView('mahasiswa.mahasiswa-generate-form-001', $data);
        // return $pdf->stream();

        $data['kp_form001'] = Form001::findOrFail($id)
            ->select('username', 'nama' ,'perusahaan1', 'alamat_perusahaan1', 'bidang_perusahaan1','perusahaan2', 'alamat_perusahaan2', 'bidang_perusahaan2')
            ->where('id', '=', $id)
            ->get($id);
        $pdf = PDF::loadView('mahasiswa.mahasiswa-generate-form-001', $data);
        return $pdf->stream();

             
    }

    public function generateForm001TU($id)
    {
        $data['kp_form001'] = Form001::findOrFail($id)
            ->select('username', 'nama' ,'perusahaan1', 'alamat_perusahaan1', 'bidang_perusahaan1','perusahaan2', 'alamat_perusahaan2', 'bidang_perusahaan2')
            ->where('id', '=', $id)
            ->get($id);
        $pdf = PDF::loadView('tata-usaha.generate-form-001', $data);
        return $pdf->stream();
    }

    // public function storeForm001(Request $request){
    //     $request->validate([

    //         'file' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'
    //     ]);

    //     if($request->hasFile('file')) {
    //         $uploadPath = public_path('uploads');

    //         if(!File::isDirectory($uploadPath)) {
    //             File::makeDirectory($uploadPath, 0755, true, true);
    //         }

    //         $file = $request->file('file');
    //         $explode = explode('.', $file->getClientOriginalName());
    //         $originalName = $explode[0];
    //         $extension = $file->getClientOriginalExtension();
    //         $rename = 'file_' . date('YmdHis') . '.' . $extension;
    //         $mime = $file->getClientMimeType();
    //         $filesize = $file->getSize();

    //         if($file->move($uploadPath, $rename)) {
    //             $media = new Media;
    //             $media->name = $originalName;
    //             $media->file = $rename;
    //             $media->extension = $extension;
    //             $media->size = $filesize;
    //             $media->mime = $mime;
    //             $media->save();

    //             return redirect()->back()->with('message', 'Berhasil, file telah di upload');
    //         }

    //         return redirect()->back()->with('message', 'Error, file tidak dapat di upload');
    //     }

    //     return redirect()->back()->with('message', 'Error, tidak ada file ditemukan');
    // }

    public function storePdf(Request $request){
         
        $validatedData = $request->validate([
         'file' => 'required|csv,txt,xlx,xls,pdf|max:2048',
 
        ]);
 
        $name = $request->file('file')->getClientOriginalName();
 
        $path = $request->file('file')->store('public/files');
 
 
        $save = new File;
 
        $save->name = $name;
        $save->path = $path;
 
        return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel 8');
 
    }


    public function tanggal(Request $request){

        $date = date('Y-m-d H:i:s');
    }
}
