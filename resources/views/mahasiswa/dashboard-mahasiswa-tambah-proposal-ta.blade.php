@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')
        {{-- {!! Form::Open(['url'=>'dashboard-mahasiswa-proposal-ta/proposal'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form class="needs-validation" action="dashboard-mahasiswa-proposal-ta/proposal" method="POST"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Daftar Sidang Proposal Tugas Akhir</h2>
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
                                                        <label for="inputId_ta">ID Proposal Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('id_proposal',null,['placeholder'=>'ID Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text"
                                                            value="PTA{{Auth::user()->username}}" name="id_proposal"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputId_ta">ID Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('id_ta',null,['placeholder'=>'ID Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text"
                                                            value="TA{{Auth::user()->username}}" name="id_ta" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text" name="judul"
                                                            placeholder="Judul Tugas Akhir" required>
                                                        <div class="invalid-feedback">
                                                            Isi Judul Tugas Akhir.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputProposal">Upload Proposal Tugas
                                                            Akhir</label><br>
                                                        {{-- <br>
                                                        {!!
                                                        Form::file('proposal')!!}
                                                        <br> --}}
                                                        <input class="form-control" type="file" name="proposal"
                                                            required>
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
                                                        <div class="invalid-feedback">
                                                            Isi File Proposal Tugas Akhir.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputRuangan">Ruangan </label><br>
                                                        {{-- {!!
                                                        Form::text('ruangan',null,['placeholder'=>'Ruangan','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="number" name="ruangan"
                                                            placeholder="Ruangan Sidang Proposal" required>
                                                        <div class="invalid-feedback">
                                                            Isi Judul Tugas Akhir.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJamSidang">Jam Sidang</label><br>
                                                        {{-- {!!
                                                        Form::time('jam_sidang',null,['placeholder'=>'NIP
                                                        Dosen','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="time" name="jam_sidang"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Isi Jam Sidang Proposal Tugas Akhir.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Tanggal Sidang</label><br>
                                                        {{-- {!!
                                                        Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                                        Sidang','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="date" name="tanggal_sidang"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Isi Tanggal Sidang Proposal Tugas Akhir.
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
        {!! Form::close()!!}
    </div>
</div>
@endsection
