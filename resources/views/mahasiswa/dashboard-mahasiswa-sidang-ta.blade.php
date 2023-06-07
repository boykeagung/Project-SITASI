@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary mb-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary mb-0">
                            <div class="card-header">
                                <h3>Sidang Tugas Akhir</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-mahasiswa-sidang-ta-tambah-data') ?>
                                    class="btn btn-primary mb-3"> <i class="fas fa-plus"></i> Tambah Data</a>
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Sidang TA</th>
                                            <th>ID TA</th>
                                            <th>Judul TA</th>
                                            <th>Buku TA</th>
                                            <th>Ruangan</th>
                                            <th>Jam Sidang</th>
                                            <th>Jadwal Sidang</th>
                                            <th>Status</th>
                                            <th>Update At</th>
                                            <th colspan="1" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0?>
                                        @foreach ($sidang_ta as $no => $sta)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$sta->id_sidang_ta}}</td>
                                            <td>{{$sta->id_ta}}</td>
                                            <td>{{$sta->judul}}</td>
                                            <td>
                                                <a href="{{'Draft_Buku_TA/'.$sta->buku_ta}}" class="btn btn-info"
                                                    target="_blank"><i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>{{$sta->ruangan}}</td>
                                            <td>{{$sta->jam_sidang}}</td>
                                            <td>{{$sta->jadwal_sidang}}</td>
                                            <td>{{$sta->status}}</td>
                                            <td>{{$sta->updated_at}}</td>
                                            <td class="text-center" width="160px">
                                                <div class="row">
                                                    <div class="col">
                                                        @if($sta->status == 'Lulus')
                                                        <a href="{{'dashboard-mahasiswa-sidang-ta-edit-data/'.$sta->id}}"
                                                            class="btn btn-secondary disabled"><i class="far fa-edit"></i></a>
                                                        {{-- {{link_to('dashboard-mahasiswa-sidang-ta-edit-data/'.$sta->id,'Edit',['class'=>'btn btn-warning'])}}
                                                        --}}
                                                        @else
                                                        <a href="{{'dashboard-mahasiswa-sidang-ta-edit-data/'.$sta->id}}"
                                                            class="btn btn-warning"><i class="far fa-edit"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
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
            <div class="row">
                @foreach ($sidang_ta as $sta)
                <div class="col-12">
                    <div class="komentar-dosen card card-primary">
                        <div class="card-header">
                            <div class="komentar-title">
                                <h4>Komentar Dosen</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tanggal-komentar fw-bold fs-6 mb-4">
                                <h5>Tanggal : {{$sta->updated_at}}</h5>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Komentar Dosen Pembimbing : </h5>
                                    <p>{{$sta->komentar1}}</p>
                                </div>
                                <div class="col">
                                    <h5>Komentar Dosen Penguji : </h5>
                                    <p>{{$sta->komentar2}}</p>
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
@endsection
