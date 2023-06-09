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
                                <h4>Daftar Sidang Kerja Praktik Mahasiswa</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-sidang-kp') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Sidang KP</th>
                                            <th>ID KP</th>
                                            {{-- <th>NRP</th> --}}
                                            {{-- <th>Nama Lengkap</th> --}}
                                            <th>Penguji 1</th>
                                            {{-- <th>Penguji 2</th> --}}
                                            <th>Laporan KP</th>
                                            <th>Ruangan</th>
                                            <th>Jam Sidang KP</th>
                                            <th>Tanggal Sidang KP</th>
                                            <th>Status</th>
                                            <th>Nilai</th>
                                            <th>Update At</th>
                                            {{-- <th>Komentar Pembimbing</th>
                                                <th>Komentar Penguji</th> --}}
                                            {{-- <th>Update at</th> --}}
                                            <th>Action</th>
                                            {{-- <th>Delete</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0?>
                                        @foreach ($sidang_kp as $skp)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$skp->id_sidang_kp}}</td>
                                            <td>{{$skp->id_kp}}</td>
                                            {{-- <td>{{$skp->username}}</td> --}}
                                            {{-- <td>{{$skp->name}}</td> --}}
                                            <td>{{$skp->penguji1}}</td>
                                            {{-- <td>{{$skp->penguji2}}</td> --}}
                                            <td>
                                                @if($skp->laporan == null)
                                                {{-- {{link_to('Laporan_kp/'.$skp->laporan,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}} --}}
                                                <a href="{{'Laporan_kp/'.$skp->laporan}}" class="btn btn-secondary disabled"
                                                    target="_blank"><i class="fas fa-eye"></i></a>
                                                @else
                                                {{-- {{link_to('Laporan_kp/'.$skp->laporan,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}} --}}
                                                <a href="{{'Laporan_kp/'.$skp->laporan}}" class="btn btn-info"
                                                    target="_blank"><i class="fas fa-eye"></i></a>
                                                @endif
                                                
                                            </td>
                                            <td>{{$skp->ruangan}}</td>
                                            <td>{{$skp->jam_sidang}}</td>
                                            <td>{{$skp->tanggal_sidang}}</td>
                                            <td>{{$skp->status}}</td>
                                            <td>
                                                @if($skp->nilai == null)
                                                {{-- {{link_to('nilai_kp/'.$skp->nilai,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}} --}}
                                                <a href="{{'nilai_kp/'.$skp->nilai}}" class="btn btn-secondary disabled"
                                                    target="_blank"><i class="fas fa-eye"></i></a>
                                                @else
                                                {{-- {{link_to('nilai_kp/'.$skp->nilai,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}} --}}
                                                <a href="{{'nilai_kp/'.$skp->nilai}}" class="btn btn-info"
                                                    target="_blank"><i class="fas fa-eye"></i></a>
                                                @endif
                                            </td>
                                            <td>{{$skp->updated_at}}</td>
                                            {{-- <td>{{$skp->komentar1}}</td>
                                            <td>{{$skp->komentar2}}</td> --}}
                                            {{-- <td>{{$skp->updated_at}}</td> --}}
                                            <td>
                                                @if($skp->status == 'Lulus')
                                                {{-- {{link_to('dashboard-mahasiswa-edit-proposal-ta/'.$pro->id,'Edit',['class'=>'btn btn-secondary disabled'])}}
                                                --}}
                                                <a href="{{'dashboard-mahasiswa-edit-sidang-kp/'.$skp->id}}"
                                                    class="btn btn-secondary disabled"><i class="far fa-edit"></i></a>
                                                @else
                                                {{-- {{link_to('dashboard-mahasiswa-edit-proposal-ta/'.$pro->id,'Edit',['class'=>'btn btn-warning'])}}
                                                --}}
                                                <a href="{{'dashboard-mahasiswa-edit-sidang-kp/'.$skp->id}}"
                                                    class="btn btn-warning"><i class="far fa-edit"></i></a>
                                                @endif
                                                {{-- {{link_to('dashboard-mahasiswa-edit-sidang-kp/'.$skp->id,'Edit',['class'=>'btn btn-warning'])}} --}}
                                            </td>
                                            {{-- <td>
                                                    {!!
                                                    Form::open(['url'=>'dashboard-koordinator-sidang-kp/'.$skp->id,'method'=>'delete'])!!}
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
                <div class="row">

                    <div class="col-12">
                        <div class="komentar-dosen card card-primary">
                            <div class="card-header">
                                <div class="komentar-title">
                                    <h4>Komentar Dosen</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($sidang_kp as $skp)
                                <div class="tanggal-komentar fw-bold fs-6 mb-4">
                                    <h5>Update At : {{$skp->updated_at}}</h5>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5>Komentar Dosen pembimbing : </h5>
                                        <p>{{$skp->komentar1}}</p>
                                    </div>
                                    <div class="col">
                                        <h5>Komentar Dosen Penguji : </h5>
                                        <p>{{$skp->komentar2}}</p>
                                    </div>
                                </div>
                                @endforeach
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
