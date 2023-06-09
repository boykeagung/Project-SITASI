@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')
        {{-- {!! Form::Open(['url'=>'dashboard-mahasiswa-seminar-ta'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form class="needs-validation" action="dashboard-mahasiswa-kp" method="POST"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Daftar Kerja Praktik</h3>
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
                                                        <label>ID KP<span style="color: red;">*</span></label>
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            value="KP{{Auth::user()->username}}" name="id_kp" readonly>
                                                        {{-- {!!
                                                        Form::text('nrp',null,['placeholder'=>'NRP Mahasiswa','class'=>'form-control'])!!} --}}
                                                        {{-- <select class="form-select" name="username" id="select1">
                                                            <option selected>NRP Mahasiswa</option>
                                                            @foreach($user as $user)
                                                            <option value="{{$user->username}}">{{$user->username}},
                                                        {{$user->name}}</option>
                                                        @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputNrp">NRP</label><br>
                                                        {{-- {!!
                                                        Form::text('nrp',null,['placeholder'=>'NRP Mahasiswa','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text"
                                                            value="{{Auth::user()->username}}" name="username" readonly>
                                                    </div>
                                                    {{-- <div class="form-group col-md-6">
                                                        <label for="inputPembimbing1">Pembimbing KP<span
                                                                style="color: red;">*</span></label>
                                                        <br> --}}
                                                    {{-- {!!
                                                        Form::text('pembimbing1',null,['placeholder'=>'NIP Dosen','class'=>'form-control'])!!} --}}
                                                    {{-- <select class="form-select" name="pembimbing_kp" id="select2">
                                                            <option selected>NIP Dosen</option>
                                                            @foreach($user1 as $user)
                                                            <option value="{{$user->username}}_{{$user->name}}">
                                                    {{$user->username}},
                                                    {{$user->name}}</option>
                                                    @endforeach
                                                    </select>
                                                </div> --}}
                                                <div class="form-group col-md-6">
                                                    <label for="inputJudul">Nama Perusahaan</label>
                                                    <br>
                                                    {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                    <input type="text" class="form-control" name="perusahaan"
                                                        placeholder="Nama Perusahaan" required>
                                                    <div class="invalid-feedback">
                                                        Isi Nama Perusahaan Kerja Praktik.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputDraft">Alamat Perusahaan</label>
                                                    <br>
                                                    <input type="text" class="form-control" name="alamat_perusahaan"
                                                        placeholder="alamat Perusahaan" required>
                                                    <div class="invalid-feedback">
                                                        Isi Alamat perusahaan Kerja Praktik.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputDraft">Bidang Perusahaan</label>
                                                    <br>
                                                    <input type="text" class="form-control" name="bidang_perusahaan"
                                                        placeholder="Bidang Perusahaan" required>
                                                    <div class="invalid-feedback">
                                                        Isi Bidang Perusahaan Kerja Praktik.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputDraft">Pembimbing Perusahaan</label>
                                                    <br>
                                                    <input type="text" class="form-control" name="pembimbing_perusahaan"
                                                        placeholder="Pembimbing Perusahaan" required>
                                                    <div class="invalid-feedback">
                                                        Isi Nama Pembimbing Perusahaan Kerja Praktik.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputDraft">Tanggal Mulai KP</label>
                                                    <br>
                                                    <input type="date" class="form-control" name="mulai_kp"
                                                        placeholder="tanggal Mulai KP" required>
                                                    <div class="invalid-feedback">
                                                        Isi Tanggal Mulai Kerja Praktik.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputDraft">Tanggal Selesai KP</label>
                                                    <br>
                                                    <input type="date" class="form-control" name="selesai_kp"
                                                        placeholder="tanggal selesai KP" required>
                                                    <div class="invalid-feedback">
                                                        Isi tanggal Selesai Kerja Praktik.
                                                    </div>
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
