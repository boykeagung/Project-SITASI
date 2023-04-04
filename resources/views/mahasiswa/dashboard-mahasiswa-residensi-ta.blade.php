@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Residensi Mahasiswa Tugas Akhir</h4>
                            </div>
                            <div id="container">
                                <a id="btn-scan-qr" class="btn btn-primary mb-3" style="color: white">
                                    <i class="fas fa-camera"></i> Buka Kamera
                                </a>
                                <canvas hidden="" id="qr-canvas"></canvas>
                                <div id="qr-result" hidden="">
                                  <b>Data:</b> <span id="outputData"></span>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('footer')
    </div>
</div>
</div>
@endsection