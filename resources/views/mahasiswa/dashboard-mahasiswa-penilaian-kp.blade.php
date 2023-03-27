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
                                <h4>Daftar Nilai Kerja Praktik Dosen Pembimbing</h4>
                            </div>
                            <div class="card-body table-responsive">  
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-penilaian-kp') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                    <table class="table table-bordered table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kepribdian</th>
                                                <th>Penguasaan Materi</th>
                                                <th>Keterampilan</th>
                                                <th>kreatifitas</th>
                                                <th>Tanggung Jawab</th>
                                                <th>Komunikasi</th>
                                                <th>Action</th>
                                                {{-- <th>Form</th> --}}
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php $no = 0?>
                                            @foreach ($nilai_dospem as $nilai)
                                            <tr>
                                                <td>{{1+$no++}}</td>
                                                <td>{{$nilai->kepribadian}}</td>
                                                <td>{{$nilai->penguasaan_materi}}</td>
                                                <td>{{$nilai->keterampilan}}</td>
                                                <td>{{$nilai->kreatifitas}}</td>
                                                <td>{{$nilai->tanggung_jawab}}</td>
                                                <td>{{$nilai->komunikasi}}</td>
                                                <td>
                                                    {{link_to('dashboard-mahasiswa-edit-nilai/'.$nilai->id,'Edit',['class'=>'btn btn-warning'])}}
                                                </td>
                                                {{-- <td>

                                                    @if($nilai->pdf_form001 == null)
                                                    {{link_to('Form_001/'.$kp_form001->pdf_form001,'File Belum Di Upload',['class'=>'btn btn-danger disabled','target'=>'_blank'])}}
                                                    <br>
                                                    <span>*tekan edit untuk upload file*</span>
                                                    @else
                                                    {{link_to('Form_001/'.$nilai->pdf_form001,'Lihat',['class'=>'btn btn-info ','target'=>'_blank'])}}
                                                    @endif

                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                   </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Nilai Kerja Praktik Dosen Pembimbing Persusahaan</h4>
                            </div>
                            <div class="card-body table-responsive">  
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-kp') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Nilai</a>
                                    <table class="table table-bordered table-striped" id="table2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kepribdian</th>
                                                <th>Penguasaan Materi</th>
                                                <th>Keterampilan</th>
                                                <th>Kreatifitas</th>
                                                <th>Tanggung Jawab</th>
                                                <th>Komunikasi</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php $no = 0?>
                                            @foreach ($nilai_dospem as $nilai)
                                            <tr>
                                                {{-- <td>{{1+$no++}}</td>
                                                <td>{{$nilai->kepribadian}}</td>
                                                <td>{{$nilai->penguasaan_materi}}</td>
                                                <td>{{$nilai->keterampilan}}</td>
                                                <td>{{$nilai->kreatifitas}}</td>
                                                <td>{{$nilai->tanggung_jawab}}</td>
                                                <td>{{$nilai->komunikasi}}</td>
                                                <td>
                                                    {{link_to('dashboard-mahasiswa-edit-nilai/'.$nilai->id,'Edit',['class'=>'btn btn-warning'])}}
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                   </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('footer')

        </div>
    </div>
</div>
@endsection