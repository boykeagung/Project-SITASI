@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')
        {{-- {!! Form::Open(['url'=>'dashboard-mahasiswa-proposal-ta/proposal'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="dashboard-mahasiswa-proposal-ta/proposal" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Tambah Bimbingan Kerja Praktik Mahasiswa</h2>
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
                                                        <label for="inputId_ta">ID Tugas Akhir</label><br>
                                                        {{-- {!!
                                                        Form::text('id_ta',null,['placeholder'=>'ID Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="text" value="TA{{Auth::user()->username}}" name="id_ta" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Waktu Bimbingan</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input class="form-control" type="date" name="judul" placeholder="Judul Tugas Akhir">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="inputJudul">Kegiatan Bimbingan</label><br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <textarea class="form-control" type="text" name="judul" placeholder="Judul Tugas Akhir"></textarea>
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