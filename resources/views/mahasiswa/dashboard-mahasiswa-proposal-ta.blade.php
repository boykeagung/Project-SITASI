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
                                <h3>Daftar Tugas Akhir</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-ta') ?> class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Daftar</a>
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ID TA</th>
                                            <th>NRP</th>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>penguji 1</th>
                                            <th>penguji 2</th>
                                            <th>Judul</th>
                                            <th>Sinopsis/Draft Proposal Tugas Akhir</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                            {{-- <th>delete</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($ta as $ta)
                                        <tr>
                                            <td>{{$ta->id_ta}}</td>
                                            <td>{{$ta->username}}</td>
                                            <td>{{$ta->pembimbing1}}</td>
                                            <td>{{$ta->pembimbing2}}</td>
                                            <td>{{$ta->penguji1}}</td>
                                            <td>{{$ta->penguji2}}</td>
                                            <td>{{$ta->judul}}</td>
                                            <td>
                                                @if($ta->draft == null)
                                                {{link_to('Draft_TA_Sinopsis/'.$ta->draft,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Draft_TA_Sinopsis/'.$ta->draft,'Lihat',['class'=>'btn btn-info ','target'=>'_blank'])}}
                                                @endif
                                            <td>{{$ta->updated_at}}</td>
                                            <td>
                                                {{link_to('dashboard-mahasiswa-edit-ta/'.$ta->id,'Edit',['class'=>'btn btn-warning'])}}
                                            </td>
                                            {{-- <td>
                                                {!! Form::open(['url'=>'dashboard-mahasiswa-proposal-ta/'.$ta->id,'method'=>'delete'])!!}
                                                {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm("Are you sure?")'])!!}
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
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Sidang Proposal Tugas Akhir</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-proposal-ta') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Daftar</a>
                                <table class="table table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th>ID Proposal TA</th>
                                            <th>ID TA</th>
                                            <th>Judul</th>
                                            <th>Proposal Tugas Akhir</th>
                                            <th>Ruangan</th>
                                            <th>Jam Sidang</th>
                                            <th>Tanggal Sidang</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            {{-- <th>Delete</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($proposal as $pro)
                                        <tr>
                                            <td>{{$pro->id_proposal}}</td>
                                            <td>{{$pro->id_ta}}</td>
                                            <td>{{$pro->judul}}</td>
                                            <td>
                                                @if($pro->proposal == null)
                                                {{link_to('Draft_Proposal_TA/'.$pro->proposal,'Lihat',['class'=>'btn btn-secondary disabled','target'=>'_blank'])}}
                                                @else
                                                {{-- {{link_to('Draft_Proposal_TA/'.$pro->proposal,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}} --}}
                                                <a href= "{{'Draft_Proposal_TA/'.$pro->proposal}}" class="btn btn-info" target="_blank"><i class="fas fa-file"></i></a>
                                                @endif
                                            </td>
                                            <td>{{$pro->ruangan}}</td>
                                            <td>{{$pro->jam_sidang}}</td>
                                            <td>{{$pro->tanggal_sidang}}</td>
                                            <td>{{$pro->status}}</td>
                                            <td>
                                                @if($pro->status == 'Lulus')
                                                {{link_to('dashboard-mahasiswa-edit-proposal-ta/'.$pro->id,'Edit',['class'=>'btn btn-secondary disabled'])}}
                                                @elseif($pro->status == 'Tidak Lulus')
                                                {{link_to('dashboard-mahasiswa-edit-proposal-ta/'.$pro->id,'Edit',['class'=>'btn btn-warning '])}}
                                                @else
                                                {{link_to('dashboard-mahasiswa-edit-proposal-ta/'.$pro->id,'Edit',['class'=>'btn btn-warning'])}}
                                                @endif
                                            </td>
                                            {{-- <td>
                                                {!! Form::open(['url'=>'dashboard-mahasiswa-proposal-ta/proposal/'.$pro->id,'method'=>'delete'])!!}
                                                {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm("Are you sure?")'])!!}
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
                    @foreach ($proposal as $pro)
                    <div class="col-12">
                        <div class="komentar-dosen card card-primary">
                            <div class="card-header">
                                <div class="komentar-title">
                                    <h4>Komentar Dosen</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tanggal-komentar fw-bold fs-6 mb-4">
                                    <h5>Update At : {{$pro->updated_at}}</h5>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5>Komentar Dosen pembimbing : </h5>
                                        <p>{{$pro->komentar1}}</p>
                                    </div>
                                    <div class="col">
                                        <h5>Komentar Dosen Penguji : </h5>
                                        <p>{{$pro->komentar2}}</p>
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