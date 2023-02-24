@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-ta')
        {{-- {!! Form::model($mahasiswa,['url'=>'dashboard-koordinator-ta/'.$mahasiswa->id,'method'=>'PUT'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form class="needs-validation" action="{{ url('dashboard-koordinator-ta',$user->id)}}" method="POST"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Data Mahasiswa</h2>
                    </div>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                        @endforeach
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="data-mahasiswa">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputNRP" class="form-label">NRP<span
                                                style="color: red;">*</span></label><br>
                                        {{-- {!!
                                        Form::text('nrp',null,['placeholder'=>'Silahkan Masukan
                                        Nrp','class'=>'form-control'])!!} --}}
                                        <input type="text" class="form-control" name="username" placeholder="NRP "
                                            value="{{$user->username}}" required>
                                        <div class="invalid-feedback">
                                            Masukan NRP Mahasiswa.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputNama" class="form-label">Nama Lengkap<span
                                                style="color: red;">*</span></label><br>
                                        {{-- {!!
                                        Form::text('nama_lengkap',null,['placeholder'=>'Silahkan Masukan Nama
                                        Lengkap','class'=>'form-control'])!!} --}}
                                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap"
                                            value="{{$user->name}}" required>
                                        <div class="invalid-feedback">
                                            Masukan Nama Mahasiswa.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail" class="form-label">Email<span
                                                style="color: red;">*</span></label><br>
                                        {{-- {!!
                                        Form::text('password',null,['placeholder'=>'Silahkan Masukan
                                        Password','class'=>'form-control'])!!} --}}
                                        <input type="text" class="form-control" name="email" placeholder="Email"
                                            value="{{$user->email}}" required>
                                        <div class="invalid-feedback">
                                            Masukan Email Mahasiswa.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword" class="form-label">Password<span
                                                style="color: red;">*</span></label><br>
                                        <input type="text" class="form-control" name="password" placeholder="Password"
                                            required>
                                        <div class="invalid-feedback">
                                            Buat Kembali Password Mahasiswa.
                                        </div>
                                        {{-- <br>
                                        {!!
                                        Form::File('foto')!!}
                                        <br> --}}
                                        {{-- <span class="text-red"> *File Upload yang diperbolehkan nya .JPG </span> --}}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputFoto" class="form-label">Foto</label><br>
                                        <input type="file" class="form-control" name="foto" placeholder="Foto"
                                            value="/Foto_Mahasiswa/{{$user->foto}}">
                                        <span>*File Upload yang diupload berupa jpeg, jpg, png maksimal sebesar 3MB
                                        </span>
                                        {{-- {!!
                                        Form::email('email',null,['placeholder'=>'Silahkan Masukan
                                        Email','class'=>'form-control'])!!} --}}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAlamat" class="form-label">Alamat</label><br>
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat"
                                            value="{{$user->alamat}}">
                                        {{-- {!!
                                        Form::text('alamat',null,['placeholder'=>'Silahkan Masukan Alamat Tempat
                                        Tinggal','class'=>'form-control'])!!} --}}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputNo_hp" class="form-label">No Handphone</label><br>
                                        <input type="text" class="form-control" name="no_hp"
                                            placeholder="No Handphone/no Telepon" value="{{$user->no_hp}}">
                                        {{-- {!!
                                        Form::text('no_hp',null,['placeholder'=>'Silahkan Masukan No
                                        Handphone','class'=>'form-control'])!!} --}}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputNo_wa" class="form-label">No Whatsapp</label><br>
                                        <input type="text" class="form-control" name="no_wa" placeholder="No Whatsapp"
                                            value="{{$user->no_wa}}">
                                        {{-- {!!
                                        Form::text('no_wa',null,['placeholder'=>'Silahkan Masukan No
                                        Whatsapp','class'=>'form-control'])!!} --}}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputIPK" class="form-label">IPK</label><br>
                                        {{-- {!!
                                        Form::text('ipk',null,['placeholder'=>'Silahkan Masukan
                                        IPK','class'=>'form-control'])!!} --}}
                                        <input type="double" class="form-control" name="ipk" placeholder="IPK"
                                            value="{{$user->ipk}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputSKS" class="form-label">SKS</label><br>
                                        {{-- {!!
                                        Form::text('sks',null,['placeholder'=>'Silahkan Masukan
                                        SKS','class'=>'form-control'])!!} --}}
                                        <input type="number" class="form-control" name="sks" placeholder="SKS"
                                            value="{{$user->sks}}">
                                    </div>
                                    <input type="text" class="form-control visually-hidden" name="level"
                                        placeholder="SKS" value="user" required>
                                    <input type="number" class="form-control visually-hidden" name="remember_token"
                                        placeholder="SKS" value="60" required>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {{-- {!! Form::submit('Save',['class'=>'btn btn-primary mb-5 mt-3'])!!} --}}
                                        <input type="submit" class="btn btn-primary" placeholder="kode Tugas Akhir"
                                            name='save'>
                                        {{-- <button type="submit" class="btn btn-primary mb-5 mt-3">Tambah Data</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @include('footer')
        </div>
        {{-- {!! Form::close()!!} --}}
    </div>
</div>
@endsection