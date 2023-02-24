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
                                <h4>Data Seminar Tugas Akhir Mahasiswa</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>NRP</th>
                                            <th>Nama lengkap</th>
                                            <th>Judul Tugas Akhir</th>
                                            <th>Jurnal</th>
                                            <th>Draft Tugas Akhir</th>
                                            <th>Ruangan</th>
                                            <th>Jam Seminar Tugas Akhir</th>
                                            <th>Tanggal Seminar</th>
                                            <th>Status</th>
                                            <th>komentar Pembimbing</th>
                                            <th>komentar Penguji</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                            {{-- <th>delete</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0
                                        ?>
                                        @foreach ($seminar as $no => $sem)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$sem->username}}</td>
                                            <td>{{$sem->name}}</td>
                                            <td>{{$sem->judul}}</td>
                                            <td>
                                                @if($sem->jurnal == null)
                                                {{link_to('Jurnal_TA/'.$sem->jurnal,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Jurnal_TA/'.$sem->jurnal,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($sem->draft == null)
                                                {{link_to('Draft_TA_Seminar/'.$sem->draft,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Draft_TA_Seminar/'.$sem->draft,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>{{$sem->ruangan}}</td>
                                            <td>{{$sem->jam_seminar}}</td>
                                            <td>{{$sem->tanggal_seminar}}</td>
                                            <td>{{$sem->status}}</td>
                                            <td>{{$sem->komentar1}}</td>
                                            <td>{{$sem->komentar2}}</td>
                                            <td>{{$sem->updated_at}}</td>
                                            <td>
                                                {{link_to('dashboard-dospem-edit-seminar-ta/'.$sem->id,'Edit',['class'=>'btn btn-warning'])}}
                                            </td>
                                            {{-- <td>
                                                {!!
                                                Form::open(['url'=>'dashboard-koordinator-seminar-ta/'.$sem->id,'method'=>'delete'])!!}
                                                {!! Form::submit('Delete',['class'=>'btn
                                                btn-danger','onclick'=>'return confirm("Are you sure?")'])!!}
                                                {!! Form::close()!!}
                                            </td> --}}
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