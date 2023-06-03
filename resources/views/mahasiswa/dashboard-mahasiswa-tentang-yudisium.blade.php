@extends('layouts.layout-dashboard')

@section('page', 'SITASI')
@section('title', 'Tata Cara Yudisium')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('navbar')

            @include('sidebar.sidebar')
            @foreach ($collection as $item)
                <div class="main-content">

                    <section class="section">
                        <div class="section-header">
                            <h1>Tata Cara Yudisium</h1>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb-item active">
                                    <a href="{{ URL::to('/dashboard-mahasiswa') }}">
                                        Dashboard Mahasiswa
                                    </a>
                                </div>
                                <div class="breadcrumb-item">
                                    Tata Cara Yudisium
                                </div>
                            </div>
                        </div>
                        <div class="section-body">
                            <div class="card card-hero">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="far fa-question-circle"></i>
                                    </div>
                                    <h4>Tata Cara Yudisium</h4>
                                    <div class="card-description">Langkah selanjutnya, silahkan tata cara Yudisium di bawah
                                        ini
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="tickets-list">
                                        <div class="ticket-item">
                                            <div class="ticket-title">
                                                <h4>Tempat, Tanggal, Waktu</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div>
                                                    <ul>
                                                        <li>Aula atau ruang serbaguna di kampus.</li>
                                                        <li>Tanggal dan waktu yudisium biasanya sudah ditetapkan sejak awal
                                                            semester dan diinformasikan melalui surat undangan atau
                                                            pengumuman di website kampus.</li>
                                                        <li>Waktu pelaksanaan biasanya pada pagi atau siang hari.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-item">
                                            <div class="ticket-title">
                                                <h4>Cara Berpakaian</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div>
                                                    <ul>
                                                        <li>Mahasiswa yang akan diwisuda disarankan untuk memakai pakaian
                                                            yang rapi dan sopan, seperti baju kemeja dan celana panjang
                                                            untuk pria, dan kebaya atau busana muslim untuk wanita.</li>
                                                        <li>Hindari memakai pakaian yang terlalu ketat atau terlalu terbuka,
                                                            seperti kaos oblong atau celana pendek.</li>
                                                        <li>Mahasiswa juga diwajibkan memakai toga, jubah akademik yang
                                                            berwarna hitam dengan hiasan warna tertentu yang menunjukkan
                                                            jurusan atau fakultas yang diambil.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-item">
                                            <div class="ticket-title">
                                                <h4>FAQ</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div>
                                                    <ul>
                                                        <li>
                                                            <strong>Apa yang harus dibawa pada hari
                                                                yudisium?
                                                            </strong>
                                                            <br>
                                                            Mahasiswa diwajibkan membawa fotokopi KTP atau identitas resmi
                                                            lainnya, fotokopi transkrip nilai terakhir, dan kartu wisuda
                                                            yang sudah diambil sebelumnya.
                                                        </li>
                                                        <li>
                                                            <strong>Siapa yang boleh menghadiri yudisium?
                                                            </strong>
                                                            <br>
                                                            Keluarga dan teman-teman mahasiswa yang akan diwisuda diizinkan
                                                            hadir. Namun, karena keterbatasan kapasitas ruang, institusi
                                                            perguruan tinggi mungkin akan membatasi jumlah tamu yang
                                                            diizinkan hadir.
                                                        </li>
                                                        <li>
                                                            <strong>Apa yang terjadi pada acara yudisium?
                                                            </strong>
                                                            <br>
                                                            Acara yudisium biasanya diawali dengan sambutan dari pimpinan
                                                            kampus atau dekan fakultas, kemudian dilanjutkan dengan
                                                            pembacaan nama-nama mahasiswa yang akan diwisuda. Setelah itu,
                                                            dilakukan penyerahan ijazah dan gelar akademik secara simbolis
                                                            kepada para mahasiswa, diikuti dengan sesi foto bersama.
                                                        </li>
                                                        <li>
                                                            <strong>Apa yang harus dilakukan setelah yudisium?
                                                            </strong>
                                                            <br>
                                                            Setelah yudisium, mahasiswa sudah resmi menjadi lulusan dan
                                                            diwajibkan untuk mengambil ijazah dan transkrip nilai di bagian
                                                            akademik kampus. Selanjutnya, mahasiswa dapat melanjutkan ke
                                                            jenjang pendidikan yang lebih tinggi atau memulai karir
                                                            profesional.
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endforeach
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
