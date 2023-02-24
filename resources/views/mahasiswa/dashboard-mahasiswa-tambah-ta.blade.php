@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')
        {{-- {!! Form::Open(['url'=>'dashboard-mahasiswa-proposal-ta','enctype'=>"multipart/form-data"])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="dashboard-mahasiswa-proposal-ta" method="POST" enctype="multipart/form-data"> 
                    {{-- PDF^ --}}
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Daftar Tugas Akhir</h2>
                    </div>
                    <div class="card-body">
                        <!-- SAVED FOR ACCORDION -->
                        <div class="accordion-pendaftaran">
                            <div class="accordion-pendaftaran-item">
                                <div class="accordion-pendaftaran-header card-header p-0">
                                    <h4>Daftar Tugas Akhir </h4>
                                </div>
                                @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    {{ $error }} <br />
                                    @endforeach
                                </div>
                                @endif
                                <div class="accordion-pendaftaran-item-body">
                                    <div class="accordion-pendaftaran-item-content">
                                        <div class="data-mahasiswa">
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTugasAkhir">Kode Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('id_ta',null,['placeholder'=>'Kode Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        {{-- <input type="text" class="form-control " name="id_ta" placeholder="kode Tugas Akhir" value="TA{{Auth::user()->username}}">
                                                        --}}
                                                        <input class="form-control" type="text"
                                                            value="TA{{Auth::user()->username}}" name="id_ta" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputNrp">NRP</label><br>
                                                        {{-- {!!
                                                        Form::text('nrp',null,['placeholder'=>'NRP Mahasiswa','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text"
                                                            value="{{Auth::user()->username}}" name="username" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="text" class="form-control" name="judul"
                                                            placeholder="Judul Tugas Akhir">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Draft Proposal/Sinopsis Tugas
                                                            Akhir</label><br>
                                                        {{-- <br> --}}
                                                        {{-- {!!
                                                        Form::file('draft',null)!!} --}}
                                                        <input class="form-control" type="file" name="draft">
                                                        {{-- <br> --}}
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