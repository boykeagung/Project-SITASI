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
                <form action="{{ url('dashboard-mahasiswa-form-001',$kp_form001->id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Edit Permohonan Kerja Praktik</h2>
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
                                                        <label for="inputJudul">Nama Lengkap<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="nama" value="{{$kp_form001->nama}}"
                                                            placeholder=" ">
                                                    </div>
                                                </div>

                                                <div class="form-row"> 
                                                    <h3 class="section-title col-8">Alternatif I</h3>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Perusahaan 1<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="perusahaan1" value="{{$kp_form001->perusahaan1}}"
                                                            placeholder="">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Alamat Perusahaan<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control"
                                                            name="alamat_perusahaan1" value="{{$kp_form001->alamat_perusahaan1}}"
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Bidang Perusahaan<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="bidang_perusahaan1" value="{{$kp_form001->bidang_perusahaan1}}"
                                                            placeholder=" ">
                                                    </div>

                                                </div>

                                                <div class="form-row"> 
                                                    <h3 class="section-title col-8">Alternatif II</h3>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Perusahaan 2<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="perusahaan2" value="{{$kp_form001->perusahaan2}}"
                                                            placeholder="">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Alamat Perusahaan<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control"
                                                            name="alamat_perusahaan2" value="{{$kp_form001->alamat_perusahaan2}}"
                                                            placeholder=" ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Bidang Perusahaan<span
                                                                style="color: red;">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" name="bidang_perusahaan2" value="{{$kp_form001->bidang_perusahaan2}}"
                                                            placeholder=" ">
                                                    </div>

                                                </div>

                                                <div class="form-row"> 
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="inputProposal">Upload Form-001</label><br>
                                                        <input class="form-control" type="file" name="pdf_form001">
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
