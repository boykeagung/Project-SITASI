@extends('layout.layout-dospem-dospenguji-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-dospem-dospenguji-ta')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Mahasiswa Bimbingan Kerja Praktik</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Bimbingan TA</th>
                                            <th>ID TA</th>
                                            <th>Waktu Bimbingan</th>
                                            <th>NRP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Kegiatan</th>
                                            <th>Status</th>
                                            {{-- <th>Paraf Pembimbing 2</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($bimbingan_kp as $no => $bkp)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$bkp->id_bkp}}</td>
                                            <td>{{$bkp->id_kp}}</td>
                                            <td>{{$bkp->tanggal_bimbingan}}</td>
                                            <td>{{$bkp->username}}</td>
                                            <td>{{$bkp->name}}</td>
                                            <td>{{$bkp->kegiatan}}</td>
                                            <td>{{$bkp->status_p1}}</td>
                                            {{-- <td>{{$bkp->status_p2}}</td> --}}
                                            <td>

                                                {{link_to('dashboard-dospem-edit-bimbingan-kp/'.$bkp->id,'Edit',['class'=>'btn btn-warning'])}}
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
