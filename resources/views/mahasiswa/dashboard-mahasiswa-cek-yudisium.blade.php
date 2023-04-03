@extends('layout.layout-mahasiswa')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('navbar')

            @include('sidebar.sidebar')

            <div class="main-content">

                <section class="section">
                    <div class="section-header">
                        <h1>Yudisium</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active">
                                <a href="{{ URL::to('/dashboard-mahasiswa') }}">
                                    Dashboard Mahasiswa
                                </a>
                            </div>
                            <div class="breadcrumb-item">
                                Yudisium
                            </div>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="card card-hero">
                            <div class="card-header">
                                <div class="card-icon">
                                    <i class="far fa-question-circle"></i>
                                </div>
                                <h4>Selamat, pendaftaran Yudisium anda <u>berhasil</u>!</h4>
                                <div class="card-description">Langkah selanjutnya, silahkan tata cara Yudisium di bawah ini
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="tickets-list">
                                    <a href="#" class="ticket-item">
                                        <div class="ticket-title">
                                            <h4>Tempat, Tanggal, Waktu</h4>
                                        </div>
                                        <div class="ticket-info">
                                            <div>Laila Tazkiah</div>
                                        </div>
                                    </a>
                                    <a href="#" class="ticket-item">
                                        <div class="ticket-title">
                                            <h4>Cara Berpakaian</h4>
                                        </div>
                                        <div class="ticket-info">
                                            <div>Rizal Fakhri</div>
                                        </div>
                                    </a>
                                    <a href="#" class="ticket-item">
                                        <div class="ticket-title">
                                            <h4>FAQ</h4>
                                        </div>
                                        <div class="ticket-info">
                                            <div>Syahdan Ubaidillah</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function(event) {
                    var scrollpos = localStorage.getItem('scrollpos');
                    if (scrollpos) window.scrollTo(0, scrollpos);
                });
                window.onbeforeunload = function(e) {
                    localStorage.setItem('scrollpos', window.scrollY);
                };
            </script>
            @include('footer')

        </div>
    </div>
@endsection
