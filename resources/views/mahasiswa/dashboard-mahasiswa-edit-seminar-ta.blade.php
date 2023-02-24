@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')
        {{-- {!! Form::model($seminar,['url'=>'dashboard-mahasiswa-seminar-ta/'.$seminar->id,'method'=>'PUT'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="{{ url('dashboard-mahasiswa-seminar-ta',$seminar->id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
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
                                                    {{-- <div class="form-group col-md-6">
                                                        <label for="inputKodeSeminar">Kode Seminar Tugas Akhir</label>
                                                        {!!
                                                        Form::text('id_seminar',null,['placeholder'=>'Kode Seminar Tugas Akhir','class'=>'form-control'])!!}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTugasAkhir">Kode Tugas Akhir</label>
                                                        {!!
                                                        Form::text('id_ta',null,['placeholder'=>'Kode Tugas Akhir','class'=>'form-control'])!!}
                                                    </div> --}}
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="text" value="{{$seminar->judul}}"
                                                            class="form-control" name="judul">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJurnal">Jurnal Tugas Akhir</label><br>
                                                        {{-- <br>
                                                        {!!
                                                        Form::file('jurnal')!!}
                                                        <br> --}}
                                                        <input type="file" value="{{$seminar->jurnal}}"
                                                            class="form-control" name="jurnal">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            5MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Draft Tugas Akhir</label><br>
                                                        {{-- <br> --}}
                                                        {{-- {!!
                                                        Form::file('draft')!!} --}}
                                                        <input type="file" value="{{$seminar->draft}}"
                                                            class="form-control" name="draft">
                                                        {{-- <br> --}}
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputRuangan">Ruangan </label><br>
                                                        {{-- {!!
                                                        Form::text('ruangan',null,['placeholder'=>'Ruangan','class'=>'form-control'])!!} --}}
                                                        <input type="text" value="{{$seminar->ruangan}}"
                                                            class="form-control" name="ruangan">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJamseminar">Jam Seminar</label><br>
                                                        {{-- {!!
                                                        Form::time('jam_seminar',null,['placeholder'=>'NIP Dosen','class'=>'form-control'])!!} --}}
                                                        <input type="time" value="{{$seminar->jam_seminar}}"
                                                            class="form-control" name="jam_seminar">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Tanggal Seminar</label><br>
                                                        {{-- {!!
                                                        Form::date('tanggal_seminar',null,['placeholder'=>'Tanggal Sidang','class'=>'form-control'])!!} --}}
                                                        <input type="date" value="{{$seminar->tanggal_seminar}}"
                                                            class="form-control" name="tanggal_seminar">
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
                                </>
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