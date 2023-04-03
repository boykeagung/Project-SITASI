@extends('layouts.layout-dashboard')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('navbar')

            @include('sidebar.sidebar-tata-usaha')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Cek Berkas Yudisium</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active">
                                <a href="http://127.0.0.1:8000/dashboard-tata-usaha">
                                    Dashboard TU
                                </a>
                            </div>
                            <div class="breadcrumb-item">
                                Yudisium
                            </div>
                            <div class="breadcrumb-item">
                                Berkas
                            </div>
                            <div class="breadcrumb-item">
                                NRP
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="row">
                        <?php foreach ($data as $d) {?>
                        <div class="col col-12 col-lg-4">
                            <div class="sticky-top pt-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>Biodata Mahasiswa</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="py-4 d-flex justify-content-center">
                                            <figure class="avatar avatar-xl">
                                                <img src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png">
                                            </figure>
                                        </div>
                                        <div class="row px-4">
                                            <table class="table table-md">
                                                <tr>
                                                    <td class="w-100 border-bottom">NRP</td>
                                                    <td class="text-right border-bottom"><?= $d->nrp ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-100 border-bottom">Tanggal Lahir</td>
                                                    <td class="text-right border-bottom"><?= $d->tanggal_lahir ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-100 border-bottom">No. HP</td>
                                                    <td class="text-right border-bottom"><?= $d->no_hp ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-100 border-bottom">Email</td>
                                                    <td class="text-right border-bottom"><?= $d->email ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-100 border-bottom">IPK</td>
                                                    <td class="text-right border-bottom"><?= $d->ipk ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-100 border-bottom">SKS</td>
                                                    <td class="text-right border-bottom"><?= $d->sks ?></td>
                                                </tr>
                                            </table>
                                            <a href="https://wa.me/+<?= $d->no_hp ?>"
                                                class="btn w-100 btn-icon icon-left btn-success mt-2">
                                                <i class="fab fa-whatsapp"></i> Message <?= $d->nama_lengkap ?> on WhatsApp
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col col-12 col-lg-8">
                            <div class="sticky-top pt-4">
                                <div class="card card-primary">
                                    <div class="card-body d-flex">
                                        <button class="btn w-100 mr-1 btn-danger">Batal</button>
                                        <button class="btn w-100 ml-1 btn-info">Terima</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Berkas Yudisium Mahasiswa</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <tbody>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Hasil Upload Mahasiswa</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Pas Foto Berwarna
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Akte Kelahiran
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Ijasah SMA
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Judul Tugas Akhir (Bahasa Indonesia)
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Judul Tugas Akhir (Bahasa Inggris)
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        6
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Bebas Peminjaman Buku Dari Perpustakaan Dan Bukti Penyerahan
                                                            Buku TA
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        7
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Transkrip Dari Sikad
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        8
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Resume SKK Dari Simskk
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        9
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Hasil Test EPT
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        10
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Bila ada
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        11
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Surat Ganti Nama
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Form Biodata Peserta Yudisum
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        13
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Sertifikat Keahlian
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        14
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Poster Ukuran A3
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        15
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Buku Tugas Akhir Yang Telah Disahkan
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        16
                                                    </td>
                                                    <td>
                                                        <a href="#"class="btn btn-icon icon-left btn-primary">
                                                            <i class="fa fa-download mr-2"></i>
                                                            Jurnal Penelitian
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Komentar TU</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <a href="#"class="mb-4 btn btn-icon icon-left btn-dark">
                                                <i class="far fa-comment"></i>
                                                Simpan Komentar
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Komentar Dosen</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection

@push('plugins-css')
@endpush

@push('template-css')
@endpush

@push('plugins-css')
@endpush

@push('specific-js')
@endpush
