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
                <form action="dashboard-mahasiswa-seminar-ta" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Daftar Seminar Tugas Akhir</h2>
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
                                                        <label for="inputKodeSeminar">Kode Seminar Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('id_seminar',null,['placeholder'=>'Kode Seminar Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text"
                                                            value="STA{{Auth::user()->username}}" name="id_seminar"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTugasAkhir">Kode Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('id_ta',null,['placeholder'=>'Kode Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text"
                                                            value="TA{{Auth::user()->username}}" name="id_ta" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas
                                                        Akhir','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text" name="judul" placeholder="Judul Tugas Akhir">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJurnal">Jurnal Tugas Akhir</label><br>
                                                        {{-- <br>
                                                        {!!
                                                        Form::file('jurnal')!!}
                                                        <br> --}}
                                                        <input type="file" class="form-control" name="jurnal">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar 5MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Draft Tugas Akhir</label><br>
                                                        {{-- <br>
                                                        {!!
                                                        Form::file('draft')!!}
                                                        <br> --}}
                                                        <input type="file" class="form-control" name="draft">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputRuangan">Ruangan </label><br>
                                                        {{-- {!!
                                                        Form::text('ruangan',null,['placeholder'=>'Ruangan','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text" name="ruangan" placeholder="Ruangan Seminar TA">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJamseminar">Jam Seminar</label><br>
                                                        {{-- {!!
                                                        Form::time('jam_seminar',null,['placeholder'=>'NIP
                                                        Dosen','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="time" name="jam_seminar" placeholder="Jam Seminar TA">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Tanggal Seminar</label><br>
                                                        {{-- {!!
                                                        Form::date('tanggal_seminar',null,['placeholder'=>'Tanggal
                                                        Sidang','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="date" name="tanggal_seminar" placeholder="Tanggal Seminar TA">
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