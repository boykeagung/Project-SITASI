@extends('layout.layout-koordinator-kp')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-kp')
        {{-- {!! Form::model($seminar,['url'=>'dashboard-mahasiswa-seminar-ta/'.$seminar->id,'method'=>'PUT'])!!} --}}


        <!-- Main Content -->
        <div class="main-content"> 
            <div class="card card-primary">
                <form action="{{ url('dashboard-koordinator-penilaian-kp',$nilai_koordinator_kp->id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    {{-- <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Tambah Nilai</h2>
                    </div> --}}
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
                                                        <label for="inputDraft">NRP<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="username" value="{{$nilai_dospem->username}}"
                                                            placeholder="" readonly>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nama<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control"
                                                            name="alamat_perusahaan1" value="{{$nilai_dospem->nama}}"
                                                            placeholder=" " readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Kepribadian<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="kepribadian" value="{{$nilai_dospem->kepribadian}}"
                                                            placeholder=" ">
                                                    </div> --}}
                                                    {{-- <div class="form-group col-md-6">
                                                        <label for="inputDraft">Penguasaan Materi<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="penguasaan_materi" value="{{$nilai_dospem->penguasaan_materi}}"
                                                            placeholder=" ">
                                                    </div> --}}
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nilai Dosen Pembimbing <span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="rataDospem" value="{{$nilai_koordinator_kp->rataDospem}}" readonly
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nilai Dosen Pembimbing Perusahaan<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="rataDospemPer" value="{{$nilai_koordinator_kp->rataDospemPer}}" readonly
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nilai Penguji Sidang<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="sidang_penguji" value="{{$nilai_koordinator_kp->sidang_penguji}}"
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nilai Pembimbing Sidang<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="sidang_pembimbing" value="{{$nilai_koordinator_kp->sidang_pembimbing}}"
                                                            placeholder=" ">
                                                    </div>

                                                </div>
                                                <div class="form-row"> 
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="">Upload Upload Nilai Kerja Praktik Oleh Dosen Pembimbing Perusahaan</label><br>
                                                        <input class="form-control" type="file" name="pdf_nilai">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
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
