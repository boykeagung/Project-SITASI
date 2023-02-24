@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')
        {{-- {!! Form::Open(['url'=>'dashboard-mahasiswa-seminar-ta'])!!} --}}


        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form action="dashboard-mahasiswa-sidang-kp" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Daftar Sidang Kerja Praktik</h3>
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
                                                        <label>ID Sidang KP</label>
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            value="SKP{{Auth::user()->username}}" name="id_sidang_kp"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputNrp">ID KP</label><br>
                                                        <input class="form-control" type="text"
                                                            value="KP{{Auth::user()->username}}" name="id_kp" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Laporan KP</label>
                                                        <br>
                                                        {{-- {!!
                                                        Form::text('judul',null,['placeholder'=>'Judul Tugas Akhir','class'=>'form-control'])!!} --}}
                                                        <input type="file" class="form-control" name="laporan">
                                                        <span>*File Upload yang diupload berupa pdf maksimal sebesar
                                                            25MB</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Ruangan Sidang</label>
                                                        <br>
                                                        <input type="text" class="form-control" name="ruangan"
                                                            placeholder="Ruangan ">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Jam Sidang</label>
                                                        <br>
                                                        <input type="time" class="form-control" name="jam_sidang"
                                                            placeholder="Jam Sidang">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDraft">Tanggal Sidang</label>
                                                        <br>
                                                        <input type="date" class="form-control" name="tanggal_sidang"
                                                            placeholder="Tanggal Sidang">
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