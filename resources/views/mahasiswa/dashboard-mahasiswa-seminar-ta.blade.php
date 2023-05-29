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
                                <h3>Seminar Tugas Akhir Mahasiswa</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-seminar-ta') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ID Seminar TA</th>
                                            <th>ID TA</th>
                                            <th>Judul Tugas Akhir</th>
                                            <th>Jurnal</th>
                                            <th>Draft Tugas Akhir</th>
                                            <th>Ruangan</th>
                                            <th>Jam Seminar</th>
                                            <th>Tanggal Seminar</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            {{-- <th>delete</th> --}}
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($seminar as $sem)
                                        <tr>
                                            <td>{{$sem->id_seminar}}</td>
                                            <td>{{$sem->id_ta}}</td>
                                            <td>{{$sem->judul}}</td>
                                            <td>
                                                @if($sem->jurnal == null)
                                                {{link_to('Jurnal_TA/'.$sem->jurnal,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Jurnal_TA/'.$sem->jurnal,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($sem->draft == null)
                                                {{link_to('Draft_TA_Seminar/'.$sem->draft,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Draft_TA_Seminar/'.$sem->draft,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>{{$sem->ruangan}}</td>
                                            <td>{{$sem->jam_seminar}}</td>
                                            <td>{{$sem->tanggal_seminar}}</td>
                                            <td>{{$sem->status}}</td>
                                            <td>
                                                @if($sem->status == 'Lulus')
                                                {{link_to('dashboard-mahasiswa-edit-seminar-ta/'.$sem->id,'Edit',['class'=>'btn btn-warning disabled'])}}
                                                @elseif($sem->status == 'Tidak Lulus')
                                                {{link_to('dashboard-mahasiswa-edit-seminar-ta/'.$sem->id,'Edit',['class'=>'btn btn-warning disabled'])}}
                                                @else
                                                {{link_to('dashboard-mahasiswa-edit-seminar-ta/'.$sem->id,'Edit',['class'=>'btn btn-warning'])}}
                                                @endif
                                            </td>
                                            {{-- <td>
                                                {!!
                                                Form::open(['url'=>'dashboard-mahasiswa-seminar-ta/'.$sem->id,'method'=>'delete'])!!}
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
                    @foreach ($seminar as $sem)
                    <div class="col-12">
                        <div class="komentar-dosen card card-primary">
                            <div class="card-header">
                                <div class="komentar-title">
                                    <h4>Komentar Dosen</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tanggal-komentar fw-bold fs-6 mb-4">
                                    <h5>Update At : {{$sem->updated_at}}</h5>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5>Komentar Dosen pembimbing : </h5>
                                        <p>{{$sem->komentar1}}</p>
                                    </div>
                                    <div class="col">
                                        <h5>Komentar Dosen Penguji : </h5>
                                        <p>{{$sem->komentar2}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            @include('footer')

        </div>
    </div>
</div>
@endsection