@extends('layout-mahasiswa') 

@section('content') 

<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div> 
      @include('navbar') 
      @include('sidebar') 
      {{-- {!! Form::model($sidang_ta,['url'=>'dashboard-mahasiswa-sidang-ta/'.$sidang_ta->id,'method'=>'PUT'])!!} --}}
      <!-- Main Content -->
      <div class="main-content">
        <div class="card card-primary">
          <form action="{{ url('dashboard-mahasiswa-sidang-ta',$sidang_ta->id) }}" method="POST" enctype="multipart/form-data">
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
                  </div> @endif <div class="accordion-pendaftaran-item-body">
                    <div class="accordion-pendaftaran-item-content">
                      <div class="card-body">
                        <div class="data-mahasiswa">
                          <div class="form-group">
                            <div class="form-row">
                              {{-- <div class="form-group col-md-6">
                                <label for="inputID_Sidang_TA" >ID Sidang Tugas Akhir</label> --}}
                                {{-- {!! Form::text('id_sidang_ta',null,['placeholder'=>'ID Sidang TA','class'=>'form-control']) !!}  --}}
                                {{-- <input class="form-control" type="text"
                                    value="SDTA{{Auth::user()->username}}" name="id_sidang_ta"
                                    readonly>
                              </div> --}}
                              {{-- <div class="form-group col-md-6">
                                <label for="inputID_TA">ID Tugas Akhir</label>
                                {!! Form::text('id_ta',null,['placeholder'=>'ID TA','class'=>'form-control']) !!}
                                <input class="form-control" type="text"
                                    value="TA{{Auth::user()->username}}" name="id_ta" readonly>
                              </div> --}}
                              <div class="form-group col-md-6">
                                <label for="inputJudul" class="form-label">Judul</label>
                                {{-- {!!Form::text('judul',null,['placeholder'=>'Judul','class'=>'form-control'])!!} --}}
                                <input type="text" name="judul" placeholder="Judul" class="form-control" value="{{$sidang_ta->judul}}">
                              </div>
                              <div>
                                <div class="form-group md-3">
                                  <label for="inputBukuTA" class="form-label">Buku TA</label>
                                  {{-- <br>{!! Form::file('buku_ta',null,['placeholder'=>'Buku TA','class'=>'form-control']) !!}<br>--}}
                                  <input type="file" class="form-control" name="buku_ta">
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
                              {{-- <div class="form-group col-md-6">
                                <label for="inputStatus">Status</label>
                                {{-- {!!Form::text('status',null,['placeholder'=>'Status','class'=>'form-control'])!!} --}}
                                {{-- <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected>Status</option>
                                    <option value="Diproses...">Diproses...</option>
                                    <option value="Ditolak">Ditolak</option>
                                    <option value="Diterima">Diterima</option> --}}
                                {{-- </select>
                            </div> --}}
                            <div class="form-group col-md-6"></div>
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
            </div>
        </div>
      </div>
    </div>
    </form>
  </div> 
  @include('footer') 
</div>
 {{-- {!! Form::close()!!}  --}}
</div>
  </div>