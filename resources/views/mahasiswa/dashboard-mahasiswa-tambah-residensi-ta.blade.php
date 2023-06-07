@extends('layout.layout-mahasiswa')
@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary">
                <form class="needs-validation" action="dashboard-mahasiswa-residensi-ta" method="POST" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Residensi Tugas Akhir</h2>
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
                                                        <label for="inputKodeResidensi">Kode Residensi Tugas Akhir</label><br>
                                                        <input class="form-control" type="text"
                                                            value="RS{{Auth::user()->username}}" name="id_residensi"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTugasAkhir">Kode Tugas Akhir</label><br>
                                                        <input class="form-control" type="text"
                                                            value="TA{{Auth::user()->username}}" name="id_ta" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputNama">Nama</label><br>
                                                        <input class="form-control" type="text"
                                                            value="{{Auth::user()->name}}" name="nama" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTanggal">Tanggal Residensi</label><br>
                                                        <input class="form-control" type="date" 
                                                            value="<?php echo date("Y-m-d"); ?>" name="tanggal" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJamMasuk">Jam Masuk </label><br>
                                                        <input class="form-control" type="time" 
                                                        value="<?php echo date('H:i:s'); ?>" name="jam_masuk" readonly>
                                                    </div>
                                                    {{-- <div class="form-group col-md-6">
                                                        <label for="inputJamKeluar">Jam Keluar</label><br>
                                                        <input class="form-control" type="time" name="jam_keluar" placeholder="Jam Keluar Residensi">
                                                    </div> --}}
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