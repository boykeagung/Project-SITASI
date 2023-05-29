@extends('layout.layout-koordinator-kp')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-kp')
        {{-- {!! Form::model($ta,['url'=>'dashboard-koordinator-proposal-ta/'.$ta->id,'method'=>'PUT'])!!} --}}

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form class="needs-validation" action="{{ url('dashboard-koordinator-sidang-kp',$sidang_kp->id)}}" method="POST"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Daftar Sidang Kerja Praktek</h2>
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
                                                        <label>ID KP<span style="color: red;">*</span></label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('nrp',null,['placeholder'=>'NRP Mahasiswa','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="id_kp" id="select1" required>
                                                            <option selected>{{$sidang_kp->id_kp}}</option>
                                                            @foreach($kp as $kp)
                                                            <option value="{{$kp->id_kp}}">{{$kp->id_kp}},
                                                                {{$kp->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Pilih ID KP Mahasiswa.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPembimbing1">Penguji 1</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('pembimbing1',null,['placeholder'=>'NIP Dosen','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="penguji1" id="select2">
                                                            <option selected>{{$sidang_kp->penguji1}}</option>
                                                            @foreach($user1 as $user)
                                                            <option value="{{$user->username}}_{{$user->name}}">
                                                                {{$user->username}},
                                                                {{$user->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPembimbing1">Penguji 2</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('pembimbing1',null,['placeholder'=>'NIP Dosen','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="penguji2" id="select3">
                                                            <option selected>{{$sidang_kp->penguji2}}</option>
                                                            @foreach($user1 as $user)
                                                            <option value="{{$user->username}}_{{$user->name}}">
                                                                {{$user->username}},
                                                                {{$user->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Laporan KP</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="file" class="form-control" name="laporan"
                                                            value="{{$sidang_kp->laporan}}">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Ruangan Sidang</label>
                                                        <br>
                                                        <input type="text" class="form-control" name="ruangan"
                                                            value="{{$sidang_kp->ruangan}}" placeholder="Ruangan ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Jam Sidang</label>
                                                        <br>
                                                        <input type="time" class="form-control" name="jam_sidang"
                                                            value="{{$sidang_kp->jam_sidang}}" placeholder="Jam Sidang">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Tanggal Sidang</label>
                                                        <br>
                                                        <input type="date" class="form-control" name="tanggal_sidang"
                                                            value="{{$sidang_kp->tanggal_sidang}}"
                                                            placeholder="Tanggal Sidang">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputStatus">Status</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('status',null,['placeholder'=>'Status','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="status">
                                                            <option value="Diproses">Diproses</option>
                                                            <option value="Revisi">Revisi</option>
                                                            <option value="Diterima">Diterima</option>
                                                            <option value="Lulus">Lulus</option>
                                                            <option value="Tidak Lulus">Tidak Lulus</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nilai</label>
                                                        <br>
                                                        <input type="file" class="form-control" name="nilai"
                                                            placeholder="tanggal selesai KP">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            5MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Komentar Pembimbing</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                                        Sidang','class'=>'form-control'])!!} --}}
                                                        <textarea type="text" class="form-control" name="komentar1"
                                                            rows="3"
                                                            placeholder="Komentar">{{$sidang_kp->komentar1}}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Komentar Penguji</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                                        Sidang','class'=>'form-control'])!!} --}}
                                                        <textarea type="text" class="form-control" name="komentar2"
                                                            rows="3"
                                                            placeholder="Komentar">{{$sidang_kp->komentar2}}</textarea>
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