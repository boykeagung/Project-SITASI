@extends('layout.layout-koordinator-ta')

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
                                <h4>Residensi Mahasiswa Tugas Akhir</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-residensi-ta') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ID Residensi</th>
                                            <th>ID TA</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($residensi as $res)
                                        <tr>
                                            <td>{{$res->id_residensi}}</td>
                                            <td>{{$res->id_ta}}</td>
                                            <td>{{$res->nama}}</td>
                                            <td>{{$res->tanggal}}</td>
                                            <td>{{$res->jam_masuk}}</td>
                                            <td>{{$res->jam_keluar}}</td>
                                            <td>
                                                {{link_to('dashboard-mahasiswa-edit-residensi-ta/'.$res->id,'Edit',['class'=>'btn btn-warning'])}}
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
            </div>
        </div>
        @include('footer')
    </div>
</div>
</div>
@endsection