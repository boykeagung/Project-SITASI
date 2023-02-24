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
                                <h4>Daftar Kerja Praktik Mahasiswa</h4>
                            </div>
                            <div class="card-body table-responsive">
                                
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-kp') ?>
                                    class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID KP</th>
                                            <th>NRP</th>
                                            <th>Pembimbing KP</th>
                                            <th>Perusahaan </th>
                                            <th>Alamat Perusahaan</th>
                                            <th>Bidang Perusahaan </th>
                                            <th>Pembimbing Perusahaan</th>
                                            <th>Tanggal Mulai KP</th>
                                            <th>Tanggal Selesai KP</th>
                                            <th>Update_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0?>
                                        @foreach ($kp as $kp)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$kp->id_kp}}</td>
                                            <td>{{$kp->username}}</td>
                                            <td>{{$kp->pembimbing_kp}}</td>
                                            <td>{{$kp->perusahaan}}</td>
                                            <td>{{$kp->alamat_perusahaan}}</td>
                                            <td>{{$kp->bidang_perusahaan}}</td>
                                            <td>{{$kp->pembimbing_perusahaan}}</td>
                                            <td>{{$kp->mulai_kp}}</td>
                                            <td>{{$kp->selesai_kp}}</td>
                                            <td>{{$kp->updated_at}}</td>
                                            <td>
                                                {{link_to('dashboard-mahasiswa-edit-kp/'.$kp->id,'Edit',['class'=>'btn btn-warning'])}}
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
                    {{-- @foreach ($kp as $skp)
                    <div class="col-12">
                        <div class="komentar-dosen card card-primary">
                            <div class="card-header">
                                <div class="komentar-title">
                                    <h4>Komentar Dosen</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tanggal-komentar fw-bold fs-6 mb-4">
                                    <h5>Tanggal : {{$kp->updated_at}}</h5>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5>Komentar Dosen pembimbing : </h5>
                                        <p>{{$kp->komentar1}}</p>
                                    </div>
                                    <div class="col">
                                        <h5>Komentar Dosen Penguji : </h5>
                                        <p>{{$kp->komentar2}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}
                </div>
            </div>

            @include('footer')

        </div>
    </div>
</div>
@endsection