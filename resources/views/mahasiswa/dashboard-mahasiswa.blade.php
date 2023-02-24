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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="section-title"></h2>
                    </div>
                    <div class="card-body">
                        <!--DIPAKAI KALAU BELUM DAFTAR SIDANG SAMA SEKALI, BUAT KONDISI PROGRESS-->
                        <!-- <h4 class="text-center">Belum Ada Progress</h4> -->
                        {{-- <div class="activities">
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-comment-alt mt-3"></i>
                                </div>
                                <!--DIPAKAI KALAU UDAH DAFTAR SIDANG, BUAT KONDISI DI TIAP2 PROGRESS-->
                                <div class="activity-detail col-3">
                                    <p>Sidang Proposal Tugas Akhir</p>
                                    <button class="btn btn-secondary btn-block" disabled>Belum Ada Progress</button>
                                    <!-- <button class="btn btn-warning btn-block" disabled>Menunggu</button>
                                    <button class="btn btn-success btn-block" disabled>Approved</button>
                                    <button class="btn btn-danger btn-block" disabled>Di Tolak</button> -->
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-comment-alt mt-3"></i>
                                </div>
                                <!--DIPAKAI KALAU UDAH DAFTAR SIDANG, BUAT KONDISI DI TIAP2 PROGRESS-->
                                <div class="activity-detail col-3">
                                    <p>Seminar Tugas Akhir</p>
                                    <button class="btn btn-secondary btn-block" disabled>Belum Ada Progress</button>
                                    <!-- <button class="btn btn-warning btn-block" disabled>Menunggu</button>
                                    <button class="btn btn-success btn-block" disabled>Approved</button>
                                    <button class="btn btn-danger btn-block" disabled>Di Tolak</button> -->
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-comment-alt mt-3"></i>
                                </div>
                                <!--DIPAKAI KALAU UDAH DAFTAR SIDANG, BUAT KONDISI DI TIAP2 PROGRESS-->
                                <div class="activity-detail col-3">
                                    <p>Sidang Tugas Akhir</p>
                                    <button class="btn btn-secondary btn-block" disabled>Belum Ada Progress</button>
                                    <!-- <button class="btn btn-warning btn-block" disabled>Menunggu</button>
                                    <button class="btn btn-success btn-block" disabled>Approved</button>
                                    <button class="btn btn-danger btn-block" disabled>Di Tolak</button> -->
                                </div>
                            </div>
                        </div> --}}
                        <div class="text-center">
                            <h4 class="text-center">Jadwal Dan Periode Sidang</h4>
                            <img class="img-fluid" src="assets/img/jadwal-sidang-22-23.png" alt="Jadwal Sidang">
                        </div>
                    </div>
                </div>
            </div>

            @include('footer')

        </div>
    </div>
</div>
@endsection