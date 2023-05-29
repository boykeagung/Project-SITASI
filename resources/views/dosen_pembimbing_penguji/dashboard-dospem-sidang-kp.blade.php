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
                                <h4>Data Mahasiswa Sidang Kerja Praktek</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NRP</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Laporan</th>
                                            <th>Ruangan</th>
                                            <th>Jam Sidang</th>
                                            <th>Tanggal Sidang</th>
                                            <th>Status</th>
                                            <th>Nilai</th>
                                            <th>Komentar Pembimbing</th>
                                            <th>Komentar Penguji</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0
                                        ?>
                                        @foreach ($sidang_kp as $skp)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$skp->username}}</td>
                                            <td>{{$skp->name}}</td>
                                            <td>
                                                @if($skp->laporan == null)
                                                {{link_to('Laporan_kp/'.$skp->laporan,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Laporan_kp/'.$skp->laporan,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>{{$skp->ruangan}}</td>
                                            <td>{{$skp->jam_sidang}}</td>
                                            <td>{{$skp->tanggal_sidang}}</td>
                                            <td>{{$skp->status}}</td>
                                            <td>
                                                @if($skp->nilai == null)
                                                {{link_to('nilai_kp/'.$skp->nilai,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('nilai_kp/'.$skp->nilai,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>{{$skp->komentar1}}</td>
                                            <td>{{$skp->komentar2}}</td>
                                            <td>{{$skp->updated_at}}</td>
                                            <td>
                                                {{link_to('dashboard-dospem-edit-sidang-kp/'.$skp->id,'Edit',['class'=>'btn btn-warning'])}}
                                            </td>
                                            {{-- <>
                                                {!! Form::open(['url'=>'dashboard-koordinator-proposal-ta/proposal/'.$pro->id,'method'=>'delete'])!!}
                                                {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm("Are you sure?")'])!!}
                                                {!! Form::close()!!}
                                            </> --}}
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