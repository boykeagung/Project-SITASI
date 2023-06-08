@extends('layout.layout-koordinator-kp')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-kp')

        <!-- Main Content -->
        <div class="main-content">
            {{-- <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Nilai Kerja Praktik Dosen Pembimbing Persusahaan</h4>
                            </div>
                            <div class="card-body table-responsive">  
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-penilaian-kp-dospem-perusahaan') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Nilai</a>
                                    <table class="table table-bordered table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NRP</th>
                                                <th>Nama</th>
                                                <th>Kepribdian</th>
                                                <th>Penguasaan Materi</th>
                                                <th>Keterampilan</th>
                                                <th>Kreatifitas</th>
                                                <th>Tanggung Jawab</th>
                                                <th>Komunikasi</th>
                                                <th>Rata-rata</th>
                                                <th>Nilai Akhir</th>
                                                <th>Action</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php $no = 0?>
                                            @foreach ($nilai_dospem as $nilai)
                                            <tr>
                                                <td>{{1+$no++}}</td>
                                                <td>{{$nilai->username}}</td>
                                                <td>{{$nilai->name}}</td>
                                                <td>{{$nilai->kepribadian}}</td>
                                                <td>{{$nilai->penguasaan_materi}}</td>
                                                <td>{{$nilai->keterampilan}}</td>
                                                <td>{{$nilai->kreatifitas}}</td>
                                                <td>{{$nilai->tanggung_jawab}}</td>
                                                <td>{{$nilai->komunikasi}}</td>
                                                <td class="text-center">{{$rataDospem}}</td>
                                                <td class="text-center">{{$temp}}</td>
                                                <td>
                                                    @if($nilai->pdf_nilai == null)
                                                    {{link_to('Nilai_KP_Dospem_Perusahaan/'.$nilai->pdf_nilai,'File Belum Di Upload',['class'=>'btn btn-danger disabled','target'=>'_blank'])}}
                                                    <br>
                                                
                                                    @else
                                                    {{link_to('Nilai_KP_Dospem_Perusahaan/'.$nilai->pdf_nilai,'Lihat',['class'=>'btn btn-info ','target'=>'_blank'])}}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{link_to('dashboard-mahasiswa-edit-penilaian-kp-dospem-perusahaan/'.$nilai->id,'Edit',['class'=>'btn btn-warning'])}}
                                                </td>
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
                                <h4>Nilai Kerja Praktik Dosen Pembimbing Persusahaan</h4>
                            </div>
                            <div class="card-body table-responsive">  
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-penilaian-kp-dospem-perusahaan') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Nilai</a>
                                    <table class="table table-bordered table-striped" id="table2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NRP</th>
                                                <th>Nama</th>
                                                <th>Kepribdian</th>
                                                <th>Penguasaan Materi</th>
                                                <th>Keterampilan</th>
                                                <th>Kreatifitas</th>
                                                <th>Tanggung Jawab</th>
                                                <th>Komunikasi</th>
                                                <th>Rata-rata</th>
                                                <th>Nilai</th>
                                                <th>Action</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php $no = 0?>
                                            @foreach ($nilai_dospem_perusahaan as $nilai)
                                            <tr>
                                                <td>{{1+$no++}}</td>
                                                <td>{{$nilai->username}}</td>
                                                <td>{{$nilai->name}}</td>
                                                <td>{{$nilai->kepribadian}}</td>
                                                <td>{{$nilai->penguasaan_materi}}</td>
                                                <td>{{$nilai->keterampilan}}</td>
                                                <td>{{$nilai->kreatifitas}}</td>
                                                <td>{{$nilai->tanggung_jawab}}</td>
                                                <td>{{$nilai->komunikasi}}</td>
                                                <td class="text-center">{{$rataDospemPerusahaan}}</td>
                                                <td>
                                                    @if($nilai->pdf_nilai == null)
                                                    {{link_to('Nilai_KP_Dospem_Perusahaan/'.$nilai->pdf_nilai,'File Belum Di Upload',['class'=>'btn btn-danger disabled','target'=>'_blank'])}}
                                                    <br>
                                                
                                                    @else
                                                    {{link_to('Nilai_KP_Dospem_Perusahaan/'.$nilai->pdf_nilai,'Lihat',['class'=>'btn btn-info ','target'=>'_blank'])}}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{link_to('dashboard-mahasiswa-edit-penilaian-kp-dospem-perusahaan/'.$nilai->id,'Edit',['class'=>'btn btn-warning'])}}
                                                </td>
                                                <td>
                                                    {!!
                                                    Form::open(['url'=>'dashboard-mahasiswa-penilaian-kp/perusahaan/'.$nilai->id,'method'=>'delete'])!!}
                                                    {!! Form::submit('Delete',['class'=>'btn
                                                    btn-danger','onclick'=>'return confirm("Are you sure?")'])!!}
                                                    {!! Form::close()!!}
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

            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Nilai Kerja Praktik</h4>
                            </div>
                            <div class="card-body table-responsive">  
                                {{-- <a href=<?php echo url('dashboard-koordinator-tambah-penilaian-kp') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Nilai</a> --}}
                                    <table class="table table-bordered table-striped" style="width: 100%" id="table3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NRP</th>
                                                <th>Nama</th>
                                                <th>Nilai Dosen Pembimbing</th>
                                                <th>Dosen Pembimbing Perusahaan</th>
                                                <th>Nilai Sidang Penguji</th>
                                                <th>Nilai Sidang Pembimbing</th>
                                                <th>Nilai Akhir</th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <tr>
                                                <?php $no = 0?>
                                                @foreach ($nilai_koordinator_kp  as $nilai)
                                                <td>{{1+$no++}}</td>
                                                <td>{{$nilai->username}}</td>
                                                <td>{{$nilai->name}}</td>
                                                <td>{{$rataDospem}}</td>
                                                <td>{{$rataDospemPerusahaan}}</td>
                                                <td>{{$nilai->sidang_penguji}}</td>
                                                <td>{{$nilai->sidang_pembimbing}}</td>
                                                <td class="text-center">{{$temp}}</td>
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