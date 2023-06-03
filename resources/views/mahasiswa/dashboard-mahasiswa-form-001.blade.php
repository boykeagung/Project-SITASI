@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Permohonan Kerja Praktik (Form-001)</h4>
                            </div>
                            <div class="card-body table-responsive">
                                
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-form-001') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data </a>
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr style="overflow: hidden;
                                        white-space: nowrap;">
                                            <th>No</th>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Perusahaan </th>
                                            <th>Alamat </th>
                                            <th>Bidang </th>
                                            {{-- <th>Perusahaan 2 </th>
                                            <th>Alamat Perusahaan 2</th>
                                            <th>Bidang Perusahaan 2</th> --}}
                                            <th>Status</th>
                                            <th>Hasil Form-001</th>
                                            <th>Re-submit Form-001</th>
                                            <th>Surat Pengantar</th>
                                            <th>Action</th>

                                    
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0?>
                                        @foreach ($kp_form001 as $kp_form001)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$kp_form001->username}}</td>
                                            <td>{{$kp_form001->nama}}</td>
                                            <td>{{$kp_form001->perusahaan1}}</td>
                                            <td>{{$kp_form001->alamat_perusahaan1}}</td>
                                            <td>{{$kp_form001->bidang_perusahaan1}}</td>
                                            {{-- <td>{{$kp_form001->perusahaan2}}</td>
                                            <td>{{$kp_form001->alamat_perusahaan2}}</td>
                                            <td>{{$kp_form001->bidang_perusahaan2}}</td> --}}
                                            <td>{{$kp_form001->status}}</td>
                                            <td>{{link_to('mahasiswa-generate-form-001/'.$kp_form001->id,'Download',['class'=>'btn btn-success', 'target'=>'_blank'])}}</td>
                                            <td>
                                                @if($kp_form001->pdf_form001 == null)
                                                {{link_to('Form_001/'.$kp_form001->pdf_form001,'File Belum Di Upload',['class'=>'btn btn-danger disabled','target'=>'_blank'])}}
                                                <br>
                                                <span>*tekan edit untuk upload file*</span>
                                                @else
                                                {{link_to('Form_001/'.$kp_form001->pdf_form001,'Lihat',['class'=>'btn btn-info ','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>
                                
                                                @if($kp_form001->surat == null)
                                                {{link_to('Surat_Pengantar/'.$kp_form001->surat,'Diproses',['class'=>'btn btn-warning disabled','target'=>'_blank'])}}
                                                <br>
                                                <span>*File belum di upload oleh TU*</span>
                                                @else
                                                {{link_to('Surat_Pengantar/'.$kp_form001->surat,'Donwload',['class'=>'btn btn-success ','target'=>'_blank'])}}
                                                @endif
                                                
                                            </td>
                            
                                            <td>{{link_to('dashboard-mahasiswa-edit-form-001/'.$kp_form001->id,'Edit',['class'=>'btn btn-outline-warning'])}}</td>
                                            
                                            {{-- <td>{{link_to('generate_nilai_kp','Download',['class'=>'btn btn-success', 'target'=>'_blank'])}}</td> --}}
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form-001 dan Surat Pengantar</h4>
                            </div>
                            <div class="card-body table-responsive">
                                
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-file'.$kp_form001->id) ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data </a>
                                <table class="table table-bordered table-striped" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NRP</th>
                                            <th>Form-001</th>
                                            <td></td>
                                           
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0?>
                                        @foreach ($file_pdf as $file)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$file->username}}</td>
                                            <td>{{$file->nama}}</td>
                                            <td>
                                                @if($file->file_pdf == null)
                                                {{link_to('Form_001/'.$file->file_pdf,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Form_001/'.$file->file_pdf,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            @include('footer')

        </div>

        
    </div>
</div>
@endsection