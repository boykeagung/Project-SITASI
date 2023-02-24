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
                <form class="needs-validation" action="{{ url('dashboard-koordinator-kp',$kp->id)}}" method="POST"
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
                                                    {{-- <div class="form-group col-md-6">
                                                        <label for="inputTugasAkhir">Kode Tugas Akhir</label>
                                                        {!!
                                                        Form::text('id_ta',null,['placeholder'=>'Kode Tugas Akhir','class'=>'form-control'])!!}
                                                    </div> --}}
                                                    <div class="form-group col-md-6">
                                                        <label>NRP<span style="color: red;">*</span></label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('nrp',null,['placeholder'=>'NRP Mahasiswa','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="username" id="select1" required>
                                                            <option selected>{{$kp->username}}</option>
                                                            @foreach($user as $user)
                                                            <option value="{{$user->username}}">{{$user->username}},
                                                                {{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Pilih NRP Mahasiswa.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPembimbing1">Pembimbing KP</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('pembimbing1',null,['placeholder'=>'NIP Dosen','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="pembimbing_kp" id="select2">
                                                            <option selected>{{$kp->pembimbing_kp}}</option>
                                                            @foreach($user1 as $user)
                                                            <option value="{{$user->username}}_{{$user->name}}">
                                                                {{$user->username}},
                                                                {{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Nama Perusahaan</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="text" class="form-control" name="perusahaan" value="{{$kp->perusahaan}}"
                                                            placeholder="Nama Perusahaan">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">alamat Perusahaan</label>
                                                        <br>
                                                        <input type="text" class="form-control" name="alamat_perusahaan" value="{{$kp->alamat_perusahaan}}"
                                                            placeholder="alamat Perusahaan">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Bidang Perusahaan</label>
                                                        <br>
                                                        <input type="text" class="form-control" name="bidang_perusahaan" value="{{$kp->bidang_perusahaan}}"
                                                            placeholder="Bidang Perusahaan">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Pembimbing Perusahaan</label>
                                                        <br>
                                                        <input type="text" class="form-control"
                                                            name="pembimbing_perusahaan" value="{{$kp->pembimbing_perusahaan}}"
                                                            placeholder="Pembimbing Perusahaan">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Tanggal Mulai KP</label>
                                                        <br>
                                                        <input type="date" class="form-control" name="mulai_kp" value="{{$kp->mulai_kp}}"
                                                            placeholder="tanggal Mulai KP">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Tanggal Selesai KP</label>
                                                        <br>
                                                        <input type="date" class="form-control" name="selesai_kp" value="{{$kp->selesai_kp}}"
                                                            placeholder="tanggal selesai KP">
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