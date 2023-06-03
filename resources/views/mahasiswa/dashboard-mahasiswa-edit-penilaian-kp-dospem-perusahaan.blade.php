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
                <form action="{{ url('dashboard-mahasiswa-penilaian-kp/perusahaan',$nilai_dospem_perusahaan->id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Nilai Dosen Pembimbing</h2>
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
                                                        <label for="inputDraft">NRP<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="username" value="{{$nilai_dospem_perusahaan->username}}"
                                                            placeholder="" readonly>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Nama<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control"
                                                            name="alamat_perusahaan1" value="{{$nilai_dospem_perusahaan->nama}}"
                                                            placeholder=" " readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Kepribadian<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="kepribadian" value="{{$nilai_dospem_perusahaan->kepribadian}}"
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Penguasaan Materi<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="penguasaan_materi" value="{{$nilai_dospem_perusahaan->penguasaan_materi}}"
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Keterampilan<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="keterampilan" value="{{$nilai_dospem_perusahaan->keterampilan}}"
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Kreatifitas<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="kreatifitas" value="{{$nilai_dospem_perusahaan->kreatifitas}}"
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Tanggung Jawab<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="tanggung_jawab" value="{{$nilai_dospem_perusahaan->tanggung_jawab}}"
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Komunikasi<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="komunikasi" value="{{$nilai_dospem_perusahaan->komunikasi}}"
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
