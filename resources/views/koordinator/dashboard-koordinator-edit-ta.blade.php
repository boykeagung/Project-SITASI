@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-ta')
        {{-- {!! Form::model($ta,['url'=>'dashboard-koordinator-proposal-ta/'.$ta->id,'method'=>'PUT'])!!} --}}

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form class="needs-validation" action="{{ url('dashboard-koordinator-proposal-ta',$ta->id)}}" method="POST"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Daftar Tugas Akhir</h2>
                    </div>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                        @endforeach
                    </div>
                    @endif
                    <div class="card-body">
                        <!-- SAVED FOR ACCORDION -->
                        <div class="accordion-pendaftaran">
                            <div class="accordion-pendaftaran-item">
                                <div class="accordion-pendaftaran-item-body">
                                    <div class="accordion-pendaftaran-item-content">
                                        <div class="data-mahasiswa">
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputNrp">NRP<span
                                                            style="color: red;">*</span></label><br>
                                                        {{-- {!!
                                                        Form::text('nrp',null,['placeholder'=>'NRP Mahasiswa','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="username" id="select1" required>
                                                            <option selected>{{$ta->username}}</option>
                                                            @foreach($user as $user)
                                                            <option value="{{$user->username}}">{{$user->username}}, {{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Pilih NRP Mahasiswa.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPembimbing1">Pembimbing 1</label><br>
                                                        {{-- {!!
                                                        Form::text('pembimbing1',null,['placeholder'=>'NIP Dosen','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="pembimbing1" id="select2">
                                                            <option selected>{{$ta->pembimbing1}}</option>
                                                            @foreach($user1 as $user)
                                                            <option value="{{$user->username}}_{{$user->name}}">{{$user->username}},
                                                                {{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPembimbing2">Pembimbing 2</label><br>
                                                        {{-- {!!
                                                        Form::text('pembimbing2',null,['placeholder'=>'NIP Dosen','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="pembimbing2" id="select3">
                                                            <option selected>{{$ta->pembimbing2}}</option>
                                                            @foreach($user1 as $user)
                                                            <option value="{{$user->username}}_{{$user->name}}">{{$user->username}},
                                                                {{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPenguji1">Penguji 1</label><br>
                                                        {{-- {!!
                                                        Form::text('penguji1',null,['placeholder'=>'NIP Dosen','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="penguji1" id="select4">
                                                            <option selected>{{$ta->penguji1}}</option>
                                                            @foreach($user1 as $user)
                                                            <option value="{{$user->username}}_{{$user->name}}">{{$user->username}},
                                                                {{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPenguji2">Penguji 2</label><br>
                                                        {{-- {!!
                                                        Form::text('penguji2',null,['placeholder'=>'NIP Dosen','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="penguji2" id="select5">
                                                            <option selected>{{$ta->penguji2}}</option>
                                                            @foreach($user1 as $user)
                                                            <option value="{{$user->username}}_{{$user->name}}">{{$user->username}},
                                                                {{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="text" class="form-control" name="judul" value="{{$ta->judul}}"
                                                            placeholder="Judul Tugas Akhir">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Draft Proposal/ Sinopsis Tugas
                                                            Akhir</label><br>
                                                        {{-- <br>
                                                        {!!
                                                        Form::file('draft')!!}
                                                        <br> --}}
                                                        <input type="file" class="form-control" name="draft" value="{{$ta->draft}}" placeholder="adjawi">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        {!! Form::submit('Save',['class'=>'btn btn-primary mb-5
                                                        mt-3'])!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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