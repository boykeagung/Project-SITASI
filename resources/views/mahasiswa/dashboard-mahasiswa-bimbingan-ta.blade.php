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
                                <h4>Bimbingan Tugas Akhir Mahasiswa</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-bimbingan-ta') ?> class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-ta') ?> class="btn btn-warning mb-3">
                                    <i class="fas fa-plus"></i> Print</a>
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ID Bimbingan TA</th>
                                            <th>ID TA</th>
                                            <th>Tanggal Bimbingan</th>
                                            <th>Kegiatan Bimbingan</th>
                                            <th>Paraf Pembimbing 1</th>
                                            <th>Paraf Pembimbing 2</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                            {{-- <th>delete</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($bimbingan_ta as $bta)
                                        <tr>
                                            <th>{{$bta->id_bta}}</th>
                                            <th>{{$bta->id_ta}}</th>
                                            <th>{{$bta->tanggal_bimbingan}}</th>
                                            <th>{{$bta->kegiatan}}</th>
                                            <th>{{$bta->status_p1}}</th>
                                            <th>{{$bta->status_p2}}</th>
                                            <th>{{$bta->updated_at}}</th>
                                            <th>{{link_to('dashboard-mahasiswa-edit-bimbingan-ta/'.$bta->id,'Edit',['class'=>'btn btn-warning'])}}
                                            </th>
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
