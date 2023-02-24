@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-ta')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data User Dosen</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <a href=<?php echo url('dashboard-koordinator-tambah-data-dosen') ?>
                                    class="btn btn-primary mb-3"> <i class="fas fa-plus"></i> Tambah Data</a>
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Foto</th>
                                            <th>Alamat</th>
                                            <th>No Telefon</th>
                                            <th>No Whatsapp</th>
                                            <th>Role</th>
                                            <th>Status Dosen</th>
                                            <th>Jabatan Akademik</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0?>
                                        @foreach ($user as $user)
                                        <tr>
                                            <td>{{1+$no++}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->password}}</td>
                                            <td>
                                                @if($user->foto==null)
                                                {{link_to('Foto_dosen/'.$user->foto,'Lihat',['class'=>'btn btn-info disabled','target'=>'_blank'])}}
                                                @else
                                                {{link_to('Foto_dosen/'.$user->foto,'Lihat',['class'=>'btn btn-info','target'=>'_blank'])}}
                                                @endif
                                            </td>
                                            <td>{{$user->alamat}}</td>
                                            <td>{{$user->no_hp}}</td>
                                            <td>{{$user->no_wa}}</td>
                                            <td>{{$user->level}}</td>
                                            <td>{{$user->status_dosen}}</td>
                                            <td>{{$user->jabatan_akademik}}</td>
                                            <td>{{$user->updated_at}}</td>
                                            <td class="text-center" width="160px">
                                                {{link_to('dashboard-koordinator-edit-data-dosen/'.$user->id,'Edit',['class'=>'btn btn-warning'])}}
                                            </td>
                                            <td>
                                                {!!
                                                Form::open(['url'=>'dashboard-koordinator-ta-dosen/'.$user->id,'method'=>'delete'])!!}
                                                {!! Form::submit('Delete',['class'=>'btn
                                                btn-danger','onclick'=>'return confirm("Are you sure?")'])!!}
                                                {!! Form::close()!!}
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