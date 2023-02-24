@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-ta')
        {{-- {!! Form::Open(['url'=>'dashboard-koordinator-seminar-ta'])!!} --}}

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form class="needs-validation" action="dashboard-koordinator-seminar-ta" method="POST" enctype="multipart/form-data" novalidate>
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
                                                        <label for="inputidta">kode Tugas Akhir<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('id_seminar',null,['placeholder'=>'Kode Seminar Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" name="id_ta" id="select1" required>
                                                            <option selected disabled value="">Kode TA</option>
                                                            @foreach($ta as $ta)
                                                            <option value="{{$ta->id_ta}}">{{$ta->id_ta}} {{$ta->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Pilih ID TA Mahasiswa.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul Tugas Akhir</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="text" class="form-control" name="judul"
                                                            placeholder="Judul Tugas Akhir">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Jurnal Tugas Akhir</label>
                                                        <br>
                                                        {{-- <br>{!!
                                                        Form::file('draft')!!}
                                                        <br> --}}
                                                        <input type="file" class="form-control" name="jurnal"
                                                            placeholder="Jurnal Tugas Akhir">
                                                            <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                                25MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Draft Tugas Akhir</label>
                                                        <br>
                                                        {{-- <br>{!!
                                                        Form::file('draft')!!}
                                                        <br> --}}
                                                        <input type="file" class="form-control" name="draft"
                                                            placeholder="Draft Tugas Akhir">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputRuangan">Ruangan</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('ruangan',null,['placeholder'=>'Ruangan','class'=>'form-control'])!!} --}}
                                                        <input type="text" class="form-control" name="ruangan"
                                                            placeholder="Ruangan">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJamSeminar">Jam Seminar</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::time('jam_seminar',null,['placeholder'=>'Jam Seminar','class'=>'form-control'])!!} --}}
                                                        <input type="time" class="form-control" name="jam_seminar"
                                                            placeholder="Jam Seminar">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Tanggal Seminar</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::date('tanggal_seminar',null,['placeholder'=>'Tanggal Seminar','class'=>'form-control'])!!} --}}
                                                        <input type="date" class="form-control" name="tanggal_seminar"
                                                            placeholder="Tanggal Seminar">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Komentar Pembimbing</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                                        Sidang','class'=>'form-control'])!!} --}}
                                                        <textarea type="text" class="form-control" name="komentar1"
                                                            rows="3" placeholder="Komentar"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Komentar Penguji</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                                        Sidang','class'=>'form-control'])!!} --}}
                                                        <textarea type="text" class="form-control" name="komentar2"
                                                            rows="3" placeholder="Komentar"></textarea>
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