@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')


        @if(Request::is('profile-mahasiswa'))
        @include('sidebar.sidebar')

        @elseif(Request::is('profile-koordinator-yudisium'))
        @include('sidebar.sidebar-koordinator-yudisium')

        @elseif(Request::is('profile-koordinator-kp'))
        @include('sidebar.sidebar-koordinator-kp')

        @elseif(Request::is('profile-koordinator'))
        @include('sidebar.sidebar-koordinator-ta')

        @elseif(Request::is('profile-tu'))
        @include('sidebar.sidebar-tata-usaha')

        @elseif(Request::is('profile-dosen'))
        @include('sidebar.sidebar-dospem-dospenguji-ta')

        @else
        @endif
        {{-- {!! Form::model($ta,['url'=>'dashboard-mahasiswa-proposal-ta/'.$ta->id,'method'=>'PUT'])!!}  --}}

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-header row">
                        <h3 class="section-title col-8">Profile User</h2>
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
                                                        <input type="text" name="judul" class="form-control" value="">
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
