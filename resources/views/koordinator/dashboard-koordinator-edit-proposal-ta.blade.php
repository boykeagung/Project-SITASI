@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-ta')
        {{-- {!! Form::model($proposal,['url'=>'dashboard-koordinator-proposal-ta/proposal/'.$proposal->id,'method'=>'PUT'])!!} --}}

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form class="needs-validation"action="{{ url('dashboard-koordinator-proposal-ta/proposal',$proposal->id)}}" method="POST"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Daftar Proposal Tugas Akhir</h2>
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
                                                        <label for="inputIDProposal">Kode Proposal Tugas Akhir</label>
                                                        {!!
                                                        Form::text('id_proposal',null,['placeholder'=>'Kode Proposal Tugas Akhir','class'=>'form-control'])!!}
                                                    </div> --}}
                                                    <div class="form-group col-md-6">
                                                        <label for="inputidta">kode Tugas Akhir<span
                                                                style="color: red;">*</span></label><br>
                                                        {{-- {!!
                                                        Form::text('id_ta',null,['placeholder'=>'Kode Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="text" class="form-control" name="id_ta" value="{{$proposal->id_ta}}" readonly>
                                                        {{-- <select class="form-select" name="id_ta" id="select1" required>
                                                            <option selected>{{$proposal->id_ta}}</option>
                                                            @foreach($ta as $ta)
                                                            <option value="{{$ta->id_ta}}">{{$ta->id_ta}} {{$ta->name}}
                                                            </option>
                                                            @endforeach
                                                        </select> --}}
                                                        <div class="invalid-feedback">
                                                            Pilih ID TA Mahasiswa.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="text" class="form-control" name="judul"
                                                            value="{{$proposal->judul}}"
                                                            placeholder="Judul Tugas Akhir">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputProposal">Upload Proposal Tugas
                                                            Akhir</label><br>
                                                        {{-- <br>{!!
                                                        Form::file('proposal')!!}
                                                        <br> --}}
                                                        <input type="file" class="form-control" name="proposal"
                                                            placeholder="Proposal Tugas Akhir">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputRuangan">Ruangan</label><br>
                                                        {{-- {!!
                                                        Form::text('ruangan',null,['placeholder'=>'Ruangan','class'=>'form-control'])!!} --}}
                                                        <input type="text" class="form-control" name="ruangan"
                                                            value="{{$proposal->ruangan}}"
                                                            placeholder="Ruangan Seminar Proposal">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJamSidang">Jam Sidang</label><br>
                                                        {{-- {!!
                                                        Form::time('jam_sidang',null,['placeholder'=>'NIP
                                                        Dosen','class'=>'form-control'])!!} --}}
                                                        <input type="time" class="form-control" name="jam_sidang"
                                                            value="{{$proposal->jam_sidang}}"
                                                            placeholder="Waktu Seminar Proposal">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Tanggal Sidang</label><br>
                                                        {{-- {!!
                                                        Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                                        Sidang','class'=>'form-control'])!!} --}}
                                                        <input type="date" class="form-control" name="tanggal_sidang"
                                                            value="{{$proposal->tanggal_sidang}}"
                                                            placeholder="Tanggal Sidang Proposal">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Komentar Pembimbing</label><br>
                                                        {{-- {!!
                                                        Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                                        Sidang','class'=>'form-control'])!!} --}}
                                                        <textarea type="text" class="form-control" name="komentar1"
                                                            rows="3"
                                                            placeholder="Komentar">{{$proposal->komentar1}}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Komentar Penguji</label><br>
                                                        {{-- {!!
                                                        Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                                        Sidang','class'=>'form-control'])!!} --}}
                                                        <textarea type="text" class="form-control" name="komentar2"
                                                            rows="3"
                                                            placeholder="Komentar">{{$proposal->komentar2}}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputStatus">Status</label><br>
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