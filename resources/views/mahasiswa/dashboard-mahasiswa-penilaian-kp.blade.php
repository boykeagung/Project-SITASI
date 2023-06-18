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
                        <div class=" card">
                            {{-- <div class="row card-header">
                                <h4 class="col">Nilai Kerja Praktik Dosen Pembimbing</h4>
                                <h4 class="col">Nilai Kerja Praktik Dosen Pembimbing Perusahaan</h4>
                            </div> --}}
                            <div class="row card-body table-responsive">  
                                <div class="col ml px-5">

                                    <div class="row">
                                        <div class="row card-header mb-3">
                                            <h4 class="col">Nilai Kerja Praktik Dosen Pembimbing</h4>
                                        </div>
                                        <div class="col">
                                        
                                            <a href=<?php echo url('dashboard-mahasiswa-tambah-penilaian-kp-dospem') ?>
                                                class="btn btn-primary mb-3">
                                                <i class="fas fa-plus"></i> Tambah Nilai</a>
                                            
                                            @foreach ($nilai_dospem as $nilai)     
                                            @if($nilai->pdf_nilai == null)
                                            {{link_to('Nilai_KP_Dospem/'.$nilai->pdf_nilai,'File Belum Di Upload',['class'=>'btn btn-danger mb-3 disabled','target'=>'_blank'])}}
                                            <br>
                                        
                                            @else
                                            {{link_to('Nilai_KP_Dospem/'.$nilai->pdf_nilai,'Lihat',['class'=>'btn btn-info mb-3 ','target'=>'_blank'])}}
                                            @endif
                                            @endforeach
                                                
                                        </div>
                                        {{-- edit data --}}
                                        <div class="col">
                                            <div style="float: right" >
                                                @foreach ($nilai_dospem as $nilai)
                                                {{link_to('dashboard-mahasiswa-edit-penilaian-kp-dospem/'.$nilai->id,'Edit',['class'=>'btn btn-warning'])}}
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="">
                                        <table class=" table table-bordered table-striped " style="width: 100%" id="table3">
                                            <thead class="text-center">
                                                <tr>
                                                    <th style="width: 0%">No</th>
                                                    <th class="text-center">Jenis Penilaian</th>
                                                    <th class="text-center">Nilai</th>
                                                    {{-- <th>Keterampilan</th>
                                                    <th>Kreatifitas</th>
                                                    <th>Tanggung Jawab</th>
                                                    <th>Komunikasi</th>
                                                    <th>Nilai</th>
                                                    <th>Action</th>
                                                    <th>Delete</th> --}}
                                                    {{-- <th>Average</th> --}}
                                                    {{-- <th>Form</th> --}}
                    
                                                </tr>
                                            </thead>
        
                                            <tbody>
                                                <?php $no = 0?>
                                                @foreach ($nilai_dospem as $nilai)
                                                <tr class="">
                                                    <td>{{1+$no++}}</td>
                                                    <td>KEPRIBADIAN</td>
                                                    <td class="text-center">{{$nilai->kepribadian}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{1+$no++}}</td>
                                                    <td>PENGUASAAN MATERI</td>
                                                    <td class="text-center">{{$nilai->penguasaan_materi}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{1+$no++}}</td>
                                                    <td>KETERAMPILAN</td>
                                                    <td class="text-center">{{$nilai->keterampilan}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{1+$no++}}</td>
                                                    <td>KREATIFITAS MAHASISWA</td>
                                                    <td class="text-center">{{$nilai->kreatifitas}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{1+$no++}}</td>
                                                    <td>TANGGUNG JAWAB DALAM KERJA PRAKTIK</td>
                                                    <td class="text-center">{{$nilai->tanggung_jawab}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{1+$no++}}</td>
                                                    <td>KOMUNIKASI</td>
                                                    <td class="text-center">{{$nilai->komunikasi}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="display: none">{{1+$no++}}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td style="display: none">{{1+$no++}}</td>
                                                    <td></td>
                                                    <td>RATA-RATA</td>
                                                    <td class="text-center">{{$nilai->rata_rata}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                       </table>
                                    </div>
                                </div>
                                
                                {{--  Nilai Kerja Praktik Dosen Pembimbing Perusahaan  --}}
                                <div class="col ml px-5">
                                    <div class="row">
                                        <div class="row card-header mb-3">
                                            <h4 class="col">Nilai Kerja Praktik Dosen Pembimbing Perusahaan</h4>
                                        </div>
                                        <div class="col">
                                            
                                            <a href=<?php echo url('dashboard-mahasiswa-tambah-penilaian-kp-dospem-perusahaan') ?>
                                                class="btn btn-primary mb-3">
                                                <i class="fas fa-plus"></i> Tambah Nilai</a>
                                                
                                            @foreach ($nilai_dospem_perusahaan as $nilai) 
                                            @if($nilai->pdf_nilai == null)
                                            {{link_to('Nilai_KP_Dospem_Perusahaan/'.$nilai->pdf_nilai,'File Belum Di Upload',['class'=>'btn btn-danger mb-3 disabled','target'=>'_blank'])}}
                                            <br>
                                        
                                            @else
                                            {{link_to('Nilai_KP_Dospem_Persuhaan/'.$nilai->pdf_nilai,'Lihat',['class'=>'btn btn-info mb-3 ','target'=>'_blank'])}}
                                            @endif
                                            @endforeach
                                                
                                        </div>
                                        {{-- edit data --}}
                                        <div class="col">
                                            <div style="float: right">
                                                @foreach ($nilai_dospem_perusahaan as $nilai)
                                                {{link_to('dashboard-mahasiswa-edit-penilaian-kp-dospem-perusahaan/'.$nilai->id,'Edit',['class'=>'btn btn-warning'])}}
                                                @endforeach          
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                        <div class="">
                                            <table class="table table-bordered table-striped" style="width: 100%" id="table4">
                                                <thead class="text-center">
                                                    <tr style="border: 0">
                                                        {{-- <th style="background: white; border: 0 ">
                                                            
                                                            <a href=<?php echo url('dashboard-mahasiswa-tambah-penilaian-kp-dospem-perusahaan') ?>
                                                                class="btn btn-primary mb-3">
                                                                <i class="fas fa-plus"></i> Tambah Nilai</a>

                                                                @if($nilai->pdf_nilai == null)
                                                                {{link_to('Nilai_KP_Dospem_Perusahaan/'.$nilai->pdf_nilai,'File Belum Di Upload',['class'=>'btn btn-danger mb-3 disabled','target'=>'_blank'])}}
                                                                <br>
                                                            
                                                                @else
                                                                {{link_to('Nilai_KP_Dospem_Persuhaan/'.$nilai->pdf_nilai,'Lihat',['class'=>'btn btn-info mb-3 ','target'=>'_blank'])}}
                                                                @endif

                                                                {{link_to('dashboard-mahasiswa-edit-penilaian-kp-dospem-perusahaan/'.$nilai->username,'Edit',['class'=>'btn btn-warning'])}}
                                                        </th> --}}

                                                    </tr>
                                                    <tr>
                                                        <th style="width: 0%">No</th>
                                                        <th class="text-center">Jenis Penilaian</th>
                                                        <th class="text-center">Nilai</th>
                                                        {{-- <th class="text-center">Action</th> --}}
                                                        {{-- <th>Keterampilan</th>
                                                        <th>Kreatifitas</th>
                                                        <th>Tanggung Jawab</th>
                                                        <th>Komunikasi</th>
                                                        <th>Nilai</th>
                                                        <th>Action</th>
                                                        <th>Delete</th> --}}
                                                        {{-- <th>Average</th> --}}
                                                        {{-- <th>Form</th> --}}
                                                    </tr>
                                                </thead>
            
                                                <tbody>
                                                    <?php $no = 0?>
                                                    @foreach ($nilai_dospem_perusahaan as $nilai)
                                                    <tr class="">
                                                        <td>{{1+$no++}}</td>
                                                        <td>KEPRIBADIAN</td>
                                                        <td class="text-center">{{$nilai->kepribadian}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{1+$no++}}</td>
                                                        <td>PENGUASAAN MATERI</td>
                                                        <td class="text-center">{{$nilai->penguasaan_materi}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{1+$no++}}</td>
                                                        <td>KETERAMPILAN</td>
                                                        <td class="text-center">{{$nilai->keterampilan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{1+$no++}}</td>
                                                        <td>KREATIFITAS MAHASISWA</td>
                                                        <td class="text-center">{{$nilai->kreatifitas}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{1+$no++}}</td>
                                                        <td>TANGGUNG JAWAB DALAM KERJA PRAKTIK</td>
                                                        <td class="text-center">{{$nilai->tanggung_jawab}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{1+$no++}}</td>
                                                        <td>KOMUNIKASI</td>
                                                        <td class="text-center">{{$nilai->komunikasi}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="display: none">{{1+$no++}}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="display: none">{{1+$no++}}</td>
                                                        <td></td>
                                                        <td>RATA-RATA</td>
                                                        <td class="text-center">{{$nilai->rata_rata}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                           </table>
                                        </div>
                                
                                </div>
                                
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
                                <h4>Nilai Sidang Kerja Praktik</h4>
                            </div>
                            <div class="card-body table-responsive">  
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-penilaian-sidang-kp') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Nilai</a>
                                    <table class="table table-bordered table-striped" id="table2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nilai Dosen Pembimbing</th>
                                                <th>Dosen Pembimbing Perusahaan</th>
                                                <th>Sidang Penguji</th>
                                                <th>Sidang Pembimbing</th>
                                                <th>Nilai Akhir</th>
                                                <th>Bukti Nilai</th>
                                                <th>Edit</th>
                                                {{-- <th>Delete</th> --}}
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php $no = 0?>
                                            @foreach ($nilai_koordinator_kp as $nilai)
                                            <tr>
                                                <td>{{1+$no++}}</td>
                                                <td>{{$rataDospem}}</td>
                                                <td>{{$rataDospemPerusahaan}}</td>
                                                <td>{{$nilai->sidang_penguji}}</td>
                                                <td>{{$nilai->sidang_pembimbing}}</td>
                                                <td>{{$temp}}</td>
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
                                                {{-- <td>
                                                    {!!
                                                    Form::open(['url'=>'dashboard-mahasiswa-penilaian-kp/perusahaan/'.$nilai->id,'method'=>'delete'])!!}
                                                    {!! Form::submit('Delete',['class'=>'btn
                                                    btn-danger','onclick'=>'return confirm("Are you sure?")'])!!}
                                                    {!! Form::close()!!}
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