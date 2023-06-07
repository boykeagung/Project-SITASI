@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-ta')

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
              <form action="{{ url('dashboard-koordinator-sidang-ta',$sidang_ta->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="user_id" value="" required>
                <div class="card-header row">
                  <h3 class="section-title col-8">Edit Data Mahasiswa Sidang Tugas Akhir </h2>
                </div>
                <div class="card-body">
                  <!-- SAVED FOR ACCORDION -->
                  <div class="accordion-pendaftaran">
                    <div class="accordion-pendaftaran-item"> 
                        @if(count($errors) > 0) 
                        <div class="alert alert-danger"> 
                          @foreach ($errors->all() as $error) {{ $error }}
                        <br /> @endforeach
                      </div> @endif 
                      <div class="accordion-pendaftaran-item-body">
                        <div class="accordion-pendaftaran-item-content">
                          <div class="card-body">
                            <div class="data-mahasiswa">
                              <div class="form-group">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>ID TA<span style="color: red;">*</span></label>
                                    <br>
                                    <select class="form-select" name="id_sidang_ta" id="select1" required>
                                        <option selected>{{$sidang_ta->id_ta}}</option>
                                        @foreach($ta as $ta)
                                        <option value="{{$ta->id_ta}}">{{$ta->id_ta}}, {{$ta->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih ID Sidang Mahasiswa
                                    </div>
                                    {{-- <label for="inputId_Sidang_Ta" class="form-label">ID Sidang TA</label>
                                    {{-- {!!Form::text('id_sidang_ta',null,['placeholder'=>'ID Sidang TA','class'=>'form-control'])!!} --}}
                                    {{-- <input type="text" name="id_sidang_ta" placeholder="ID Sidang TA" class="form-control" value="{{$sidang_ta->id_sidang_ta}}"> --}}
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputID_TA" class="form-label">ID TA</label>
                                    {{-- {!!Form::text('id_ta',null,['placeholder'=>'ID TA','class'=>'form-control'])!!} --}}
                                    <input type="text" name="id_ta" placeholder="ID Tugas Akhir" class="form-control" value="{{$sidang_ta->id_ta}}">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputJudul" class="form-label">Judul</label>
                                    {{-- {!!Form::text('judul',null,['placeholder'=>'Judul','class'=>'form-control'])!!} --}}
                                    <input type="text" name="judul" placeholder="Judul" class="form-control" value="{{$sidang_ta->judul}}">
                                  </div>
                                  <div>
                                    <div class="form-group md-3">
                                      <label for="inputBukuTA" class="form-label">Buku TA</label>
                                      {{-- <br>{!! Form::file('buku_ta',null,['placeholder'=>'Buku TA','class'=>'form-control']) !!}<br>--}}
                                      <input type="file" class="form-control" name="buku_ta" value="{{$sidang_ta->buku_ta}}">
                                      <span class="text-red"> *File Upload yang diperbolehkan nya .PDF </span>
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputRuangan" class="form-label">Ruangan</label>                                
                                    <input type="text" name="ruangan" placeholder="Ruangan" class="form-control" value="{{$sidang_ta->ruangan}}">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputJam_Sidang" class="form-label">Jam Sidang</label>                                
                                    <input type="time" name="jam_sidang" placeholder="Jam Sidang" class="form-control" value="{{$sidang_ta->jam_sidang}}">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputJadwal_Sidang" class="form-label">Jadwal Sidang</label>                                
                                    <input type="date" name="jadwal_sidang" placeholder="Jadwal Sidang" class="form-control" value="{{$sidang_ta->jadwal_sidang}}">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputStatus">Status</label>
                                    {{-- {!!Form::text('status',null,['placeholder'=>'Status','class'=>'form-control'])!!} --}}
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option selected>Status</option>
                                        <option value="Diproses...">Diproses...</option>
                                        <option value="Ditolak">Ditolak</option>
                                        <option value="Diterima">Diterima</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputTanggal">Komentar Pembimbing</label><br>
                                    {{-- {!!
                                    Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                    Sidang','class'=>'form-control'])!!} --}}
                                    <textarea type="text" class="form-control" name="komentar1"
                                        rows="3"
                                        placeholder="Komentar">{{$sidang_ta->komentar1}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTanggal">Komentar Penguji</label><br>
                                    {{-- {!!
                                    Form::date('tanggal_sidang',null,['placeholder'=>'Tanggal
                                    Sidang','class'=>'form-control'])!!} --}}
                                    <textarea type="text" class="form-control" name="komentar2"
                                        rows="3"
                                        placeholder="Komentar">{{$sidang_ta->komentar2}}</textarea>
                                </div>
                                  <div class="form-group col-md-6"> {!! Form::submit('Save',['class'=>'btn btn-primary mb-5 mt-3'])!!} </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        
            @include('footer')

        </div>
    </div>
</div>
@endsection
