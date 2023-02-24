@extends('layouts.layout-dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>

        @include('components.navbar')

        @include('components.sidebar-dospem-dospenguji-ta')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Mahasiswa Sidang Proposal Tugas Akhir</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>No</th>
                                            <th>NRP</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Judul</th>
                                            <th>Proposal TA</th>
                                            <th>Ruangan</th>
                                            <th>Jam Sidang</th>
                                            <th>Tanggal Sidang</th>
                                            <th>Status</th>
                                            <th>Komentar Pembimbing</th>
                                            <th>Komentar Penguji</th>
                                            <th>Action</th>
                                        </tr>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0
                                        ?>
                                        @foreach ($proposal as $pro)
                                        <tr>
                                            <td>{{1+$no++}}</td>
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
                                            <td>
                                                {{link_to('dashboard-dospenguji-edit-proposal-ta/'.$pro->id,'Edit',['class'=>'btn btn-warning'])}}
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
            @include('components.footer')
        </div>
    </div>
</div>
@endsection

@push('plugins-css')
@endpush

@push('template-css')
@endpush

@push('plugins-css')
@endpush

@push('specific-js')
@endpush