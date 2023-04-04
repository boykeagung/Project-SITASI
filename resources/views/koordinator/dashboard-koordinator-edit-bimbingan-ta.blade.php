@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-ta')

        {{-- {!! Form::Open(['url'=>'dashboard-mahasiswa-proposal-ta/proposal'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="{{ url('dashboard-koordinator-bimbingan-ta',$bimbingan_ta->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Tambah Bimbingan Tugas Akhir Mahasiswa</h2>
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
                                                            <option selected >{{$bimbingan_ta->id_ta}}</option>
                                                            @foreach($ta as $ta)
                                                            <option value="{{$ta->id_ta}}">{{$ta->id_ta}} {{$ta->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Pilih ID TA Mahasiswa.
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group col-md-6">
                                                        <label for="inputId_ta">ID Tugas Akhir</label><br>
                                                        {!!
                                                        Form::text('id_ta',null,['placeholder'=>'ID Tugas Akhir','class'=>'form-control'])!!}
                                                        <input class="form-control" type="text" value="TA{{Auth::user()->username}}" name="id_ta" readonly>
                                                    </div> --}}
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Waktu Bimbingan</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="date" name="tanggal_bimbingan" placeholder="Judul Tugas Akhir" value="{{$bimbingan_ta->tanggal_bimbingan}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Kegiatan Bimbingan</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <textarea class="form-control" type="text" name="kegiatan" placeholder="Kegiatan Bimbingan">{{$bimbingan_ta->kegiatan}}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputidta">Status Dosen Pembimbing 1</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('id_seminar',null,['placeholder'=>'Kode Seminar Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="status_p1">
                                                            <option selected >{{$bimbingan_ta->status_p1}}</option>
                                                            <option value="Diproses">Diproses</option>
                                                            {{-- <option value="Revisi">Revisi</option> --}}
                                                            <option value="Diterima">Diterima</option>
                                                            {{-- <option value="Lulus">Lulus</option> --}}
                                                            <option value="Ditolak">Ditolak</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputidta">Status Dosen Pembimbing 2</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('id_seminar',null,['placeholder'=>'Kode Seminar Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="status_p2">
                                                            <option selected >{{$bimbingan_ta->status_p2}}</option>
                                                            <option value="Diproses">Diproses</option>
                                                            {{-- <option value="Revisi">Revisi</option> --}}
                                                            <option value="Diterima">Diterima</option>
                                                            {{-- <option value="Lulus">Lulus</option> --}}
                                                            <option value="Ditolak">Ditolak</option>
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
        {!! Form::close()!!}
    </div>
</div>
@endsection