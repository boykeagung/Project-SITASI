@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-ta')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Tugas Akhir</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-koordinator-tambah-ta') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID TA</th>
                                            <th>NRP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Penguji 1</th>
                                            <th>Penguji 2</th>
                                            <th>Judul</th>
                                            <th>Sinopsis/Draft Proposal Tugas Akhir</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($ta as $no => $ta)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$ta->id_ta}}</td>
                                            <td>{{$ta->username}}</td>
                                            <td>{{$ta->name}}</td>
                                            <td>{{$ta->pembimbing1}}</td>
                                            <td>{{$ta->pembimbing2}}</td>
                                            <td>{{$ta->penguji1}}</td>
                                            <td>{{$ta->penguji2}}</td>
                                            <td>{{$ta->judul}}</td>
                                            {{-- <td><a href="/Draft_TA_Sinopsis/{{ $ta->draft }}"
                                                    target="_blank">{{$ta->draft}}</td> --}}
                                            <td>
                                                @if($ta->draft == null)
                                                {{link_to('Draft_TA_Sinopsis/'.$ta->draft,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Draft_TA_Sinopsis/'.$ta->draft,'Lihat',['class'=>'btn btn-info ','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>{{$ta->updated_at}}</td>
                                            <td>
                                                {{link_to('dashboard-koordinator-edit-ta/'.$ta->id,'Edit',['class'=>'btn btn-warning'])}}
                                            </td>
                                            <td>
                                                {!!
                                                Form::open(['url'=>'dashboard-koordinator-proposal-ta/'.$ta->id,'method'=>'delete'])!!}
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
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Proposal Tugas Akhir</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-koordinator-tambah-proposal-ta') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                <table class="table table-bordered table-striped" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Proposal TA</th>
                                            <th>ID TA</th>
                                            <th>NRP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Judul</th>
                                            <th>Proposal TA</th>
                                            <th>Ruangan</th>
                                            <th>Jam Sidang</th>
                                            <th>Tanggal Sidang</th>
                                            <th>Status</th>
                                            <th>Komentar Pembimbing</th>
                                            <th>Komentar Penguji</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($proposal as $no => $pro)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$pro->id_proposal}}</td>
                                            <td>{{$pro->id_ta}}</td>
                                            <td>{{$pro->username}}</td>
                                            <td>{{$pro->name}}</td>
                                            <td>{{$pro->judul}}</td>
                                            <td>
                                                @if($pro->proposal == null)
                                                {{link_to('Draft_Proposal_TA/'.$pro->proposal,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Draft_Proposal_TA/'.$pro->proposal,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>{{$pro->ruangan}}</td>
                                            <td>{{$pro->jam_sidang}}</td>
                                            <td>{{$pro->tanggal_sidang}}</td>
                                            <td>{{$pro->status}}</td>
                                            <td>{{$pro->komentar1}}</td>
                                            <td>{{$pro->komentar2}}</td>
                                            <td>{{$pro->updated_at}}</td>
                                            <td>
                                                {{link_to('dashboard-koordinator-edit-proposal-ta/'.$pro->id,'Edit',['class'=>'btn btn-warning'])}}
                                            </td>
                                            <td>
                                                {!!
                                                Form::open(['url'=>'dashboard-koordinator-proposal-ta/proposal/'.$pro->id,'method'=>'delete'])!!}
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
            </div>
            @include('footer')
        </div>
    </div>
</div>
@endsection