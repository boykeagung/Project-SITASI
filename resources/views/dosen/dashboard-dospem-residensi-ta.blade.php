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
                                <h4>Data Mahasiswa Residensi</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>ID Residensi</th>
                                            <th>ID TA</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0
                                        ?>
                                        @foreach ($residensi as $no => $res)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$res->id_residensi}}</td>
                                            <td>{{$res->id_ta}}</td>
                                            <td>{{$res->nama}}</td>
                                            <td>{{$res->tanggal}}</td>
                                            <td>{{$res->jam_masuk}}</td>
                                            <td>{{$res->jam_keluar}}</td>
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