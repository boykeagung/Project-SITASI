@extends('layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar')
        
        <div class="main-content">
            <div class="card card-primary mb-0">
                <form action="dashboard-koordinator-sidang-ta" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Daftar Sidang Tugas Akhir</h2>
                    </div>
                    <div class="card-body">
                        <div class="accordion-pendaftaran">
                            <div class="accordion-pendaftaran-item">
                                <div class="accordion-pendaftaran-header card-header p-0">
                                    <h4>Input Data Mahasiswa Sidang Tugas Akhir</h4>
                                </div>
                                @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    {{ $error }} <br/>
                                    @endforeach
                                </div>
                                @endif
                                <div class="accordion-pendaftaran-item-body">
                                    <div class="accordion-pendaftaran-item-content">
                                        <div class="data-mahasiswa">
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputID_Sidang_TA" >ID Tugas Akhir<span
                                                            style="color: red;">*</span></label>
                                                            <br>
                                                        {{-- {!! Form::text('id_sidang_ta',null,['placeholder'=>'ID Sidang TA','class'=>'form-control']) !!}  --}}
                                                        <select class="form-select" name="id_ta" id="select1" required>
                                                            <option selected disabled value="">ID TA</option>
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
                                                        <label for="inputID_TA">ID Tugas Akhir</label> --}}
                                                        {{-- {!! Form::text('id_ta',null,['placeholder'=>'ID TA','class'=>'form-control']) !!} --}}
                                                        {{-- <input class="form-control" type="text"
                                                            value="TA{{Auth::user()->username}}" name="id_ta" readonly>
                                                    </div> --}}
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul</label>
                                                        <input class="form-control" type="text" name="judul"
                                                            placeholder="Judul">                                                    
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputRuangan" >Ruangan</label>
                                                        {!! Form::text('ruangan',null,['placeholder'=>'Ruangan','class'=>'form-control']) !!}                                                    
                                                    </div>  
                                                    <div class="form-group col-md-6">                                                       
                                                            <label for="inputBukuTA" class="form-label">Buku TA</label>
                                                            {{-- <br>
                                                                {!! Form::file('buku_ta',null,['placeholder'=>'Buku TA','class'=>'form-control']) !!}
                                                            <br>                                                             --}}
                                                            <input type="file" class="form-control" name="buku_ta">
                                                            <span class="text-red"> *File Upload yang diperbolehkan nya .PDF </span>  
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJadwal_Sidang" >Jadwal Sidang</label>
                                                        {!! Form::date('jadwal_sidang',null,['placeholder'=>'Jadwal Sidang','class'=>'form-control']) !!}                                                    
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJam_Sidang" >Jam Sidang</label>
                                                        {!! Form::time('jam_sidang',null,['placeholder'=>'Jam Sidang','class'=>'form-control']) !!}                                                    
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
                                                    {{-- <div class="form-group col-md-6">
                                                        <label for="inputStatus">Status</label> --}}
                                                        {{-- {!!
                                                        Form::text('status',null,['placeholder'=>'Status','class'=>'form-control'])!!} --}}
                                                        {{-- <select class="form-select" aria-label="Default select example" name="status">
                                                            <option selected>Status</option>
                                                            <option value="Diproses...">Diproses...</option> --}}
                                                            {{-- <option value="Ditolak">Ditolak</option>
                                                            <option value="Diterima">Diterima</option> --}}
                                                        {{-- </select>
                                                    </div>--}}
                                                </div>
                                            </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        {!! Form::submit('Save',['class'=>'btn btn-primary mb-5 mt-3'])!!}
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
        </div>

        @include('footer')

    </div>
    {!! Form::close()!!}
</div>