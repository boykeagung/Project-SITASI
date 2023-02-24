@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')
        {{-- {!! Form::model($ta,['url'=>'dashboard-mahasiswa-proposal-ta/'.$ta->id,'method'=>'PUT'])!!}  --}}

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="{{ url('dashboard-mahasiswa-proposal-ta',$ta->id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-header row">
                        <h3 class="section-title col-8">Update Daftar Tugas Akhir</h2>
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
                                                        <label for="inputTugasAkhir">Kode Tugas Akhir</label>
                                                        {!!
                                                        Form::text('id_ta',null,['placeholder'=>'Kode Tugas Akhir','class'=>'form-control'])!!}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputNrp">NRP</label>
                                                        {!!
                                                        Form::text('nrp',null,['placeholder'=>'NRP Mahasiswa','class'=>'form-control'])!!}
                                                    </div> --}}
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',$ta->judul,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="text" name="judul" class="form-control"
                                                            value="{{$ta->judul}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Draft Proposal/ Sinopsis Tugas
                                                            Akhir</label><br>
                                                        <input class="form-control" type="file" name="draft">
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