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
                        <div class="col col-12 col-lg-5">
                            <div class="card author-box card-primary">
                                <div class="card-body">
                                    <div class="author-box-left">
                                        <img alt="image" src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png"
                                            class="rounded-circle author-box-picture">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="author-box-details">
                                        <div class="author-box-name">
                                            <?= $d->nama_lengkap ?>
                                        </div>
                                        <div class="author-box-job">Student</div>
                                        <div class="mb-2 mt-3">
                                            <div class="text-small font-weight-bold">Informasi Mahasiswa</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto">
                                                NRP
                                            </div>
                                            <div class="col-auto">
                                                <?= $d->nrp ?>
                                                <?= $d->tanggal_lahir ?>
                                                <?= $d->no_hp ?>
                                                <?= $d->email ?>
                                                <?= $d->ipk ?>
                                                <?= $d->sks ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn w-100 btn-icon icon-left btn-success">
                                        <i class="fab fa-whatsapp"></i> Message <?= $d->nama_lengkap ?> on WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col col-12 col-lg-7">
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
                                                    <th>Persyaratan</th>
                                                    <th>Detail</th>
                                                    <th>File</th>
                                                    <th>Tipe</th>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        1
                                                    </td>
                                                    <td>Pas Foto Berwarna</td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        2
                                                    </td>
                                                    <td>Akte Kelahiran</td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        3
                                                    </td>
                                                    <td>Ijasah SMA</td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        4
                                                    </td>
                                                    <td>Judul Tugas Akhir (Bahasa Indonesia)</td>
                                                    <td>File sudah disetujui tugas akhir</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        5
                                                    </td>
                                                    <td>Judul Tugas Akhir (Bahasa Inggris)</td>
                                                    <td>File sudah disetujui tugas akhir</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        6
                                                    </td>
                                                    <td>Bebas Peminjaman Buku Dari Perpustakaan Dan
                                                        Bukti
                                                        Penyerahan
                                                        Buku TA
                                                    </td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        7
                                                    </td>
                                                    <td>Transkrip Dari Sikad</td>
                                                    <td>Harus sudah di tanda tangan oleh dosen wali</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        8
                                                    </td>
                                                    <td>Resume SKK Dari Simskk</td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        9
                                                    </td>
                                                    <td>Hasil Test EPT</td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        10
                                                    </td>
                                                    <td>Bukti Pembayaran, Melunasi Kewajiban
                                                        Keuangan/Hutang
                                                        Disemester
                                                        Terakhir
                                                    </td>
                                                    <td>Bila ada</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-secondary">Opsional
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        11
                                                    </td>
                                                    <td>Surat Ganti Nama, 1 Lembar</td>
                                                    <td>Apabila nama sekarang berbeda dengan nama yang
                                                        tercantum
                                                        dalam
                                                        akte
                                                        kelahiran / surat kenal lahir</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-secondary">Opsional
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        12
                                                    </td>
                                                    <td>Form Biodata Peserta Yudisum</td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        13
                                                    </td>
                                                    <td>Sertifikat Keahlian</td>
                                                    <td>Jika lebih dari 1 sertifikat, silahkan diupload
                                                        berulang
                                                    </td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-secondary">Opsional
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        14
                                                    </td>
                                                    <td>Poster Ukuran A3</td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        15
                                                    </td>
                                                    <td>Buku Tugas Akhir Yang Telah Disahkan</td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        16
                                                    </td>
                                                    <td>Jurnal Penelitian</td>
                                                    <td>-</td>
                                                    <td>PDF (400KB)</td>
                                                    <td>
                                                        <div class="badge badge-info">Wajib</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer d-flex">
                                    <button class="btn w-100 mr-1 btn-danger">Batalkan / Ulangi</button>
                                    <button class="btn w-100 ml-1 btn-primary">Lanjutkan Ke Dosen Koordinator</button>
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
