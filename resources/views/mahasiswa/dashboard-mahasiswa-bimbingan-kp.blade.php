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
                                <h4>Bimbingan Kerja Praktik Mahasiswa</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-ta') ?> class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ID TA</th>
                                            <th>Waktu Bimbingan</th>
                                            <th>Kegiatan Bimbingan</th>
                                            <th>Paraf Pembimbing</th>
                                            {{-- <th>Paraf Pembimbing 2</th> --}}
                                            <th>Update At</th>
                                            <th>Action</th>
                                            {{-- <th>delete</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th>162019028</th>
                                            <th>7 january</th>
                                            <th>revisi bab 3</th>
                                            <th>Approve</th>
                                            {{-- <th>Approve</th> --}}
                                            <th>Update At</th>
                                            <th><button>edit</button></th>
                                        </tr>
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