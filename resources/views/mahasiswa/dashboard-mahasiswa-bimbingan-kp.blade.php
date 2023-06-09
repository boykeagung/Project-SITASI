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
                                <a href=<?php echo url('dashboard-mahasiswa-tambah-bimbingan-kp') ?> class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                                <a href=<?php echo url('dashboard-mahasiswa-bimbingan-kp-print') ?> class="btn btn-warning mb-3">
                                    <i class="fas fa-plus"></i> Print</a>
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ID Bimbingan KP</th>
                                            <th>ID KP</th>
                                            <th>Waktu Bimbingan</th>
                                            <th>Kegiatan Bimbingan</th>
                                            <th>Status</th>
                                            {{-- <th>Paraf Pembimbing 2</th> --}}
                                            <th>Update At</th>
                                            <th>Action</th>
                                            {{-- <th>delete</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($bimbingan_kp as $bkp)
                                        <tr>
                                            <th>{{$bkp->id_bkp}}</th>
                                            <th>{{$bkp->id_kp}}</th>
                                            <th>{{$bkp->tanggal_bimbingan}}</th>
                                            <th>{{$bkp->kegiatan}}</th>
                                            <th>{{$bkp->status_p1}}</th>
                                            {{-- <th>{{$bkp->status_p2}}</th> --}}
                                            <th>{{$bkp->updated_at}}</th>
                                            <th>
                                                @if($bkp->status_p1 == 'Diterima')
                                                {{-- {{link_to('dashboard-mahasiswa-edit-proposal-ta/'.$pro->id,'Edit',['class'=>'btn btn-secondary disabled'])}} --}}
                                                <a href="{{'dashboard-mahasiswa-edit-bimbingan-kp/'.$bkp->id}}" class="btn btn-secondary disabled"><i class="far fa-edit"></i></a>
                                                @else
                                                {{-- {{link_to('dashboard-mahasiswa-edit-proposal-ta/'.$pro->id,'Edit',['class'=>'btn btn-warning'])}} --}}
                                                <a href="{{'dashboard-mahasiswa-edit-bimbingan-kp/'.$bkp->id}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                                @endif
                                                {{-- {{link_to('dashboard-mahasiswa-edit-bimbingan-kp/'.$bkp->id,'Edit',['class'=>'btn btn-warning'])}} --}}
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
