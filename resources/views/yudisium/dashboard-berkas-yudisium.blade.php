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
                    <?php foreach ($data as $d) {?>
                    <div class="row">
                        <div class="col col-12 col-lg-3">
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
                                                <i class="fab fa-whatsapp"></i> Message on WhatsApp
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 col-lg-9">
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
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Nama Dokumen
                                                    </th>
                                                    <th>
                                                        Dokumen
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        Pas Foto Berwarna
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->pas_foto)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->pas_foto) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2
                                                    </td>
                                                    <td>
                                                        Akte Kelahiran
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->akta_kelahiran)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->akta_kelahiran) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3
                                                    </td>
                                                    <td>
                                                        Ijasah SMA
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->ijasah_sekolah_menengah)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->ijasah_sekolah_menengah) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4
                                                    </td>
                                                    <td>
                                                        Judul Tugas Akhir (Bahasa Indonesia)
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->judul_ta_id)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->judul_ta_id) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5
                                                    </td>
                                                    <td>
                                                        Judul Tugas Akhir (Bahasa Inggris)
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->judul_ta_en)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->judul_ta_en) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        6
                                                    </td>
                                                    <td>
                                                        Bebas Peminjaman Buku Dari Perpustakaan Dan Bukti Penyerahan
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->bebas_pinjam_buku)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->bebas_pinjam_buku) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        7
                                                    </td>
                                                    <td>
                                                        Transkrip Dari Sikad
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->transkrip_dari_sikad)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->transkrip_dari_sikad) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        8
                                                    </td>
                                                    <td>
                                                        Resume SKK Dari Simskk
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->resume_skk_dan_simskk)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->resume_skk_dan_simskk) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        9
                                                    </td>
                                                    <td>
                                                        Hasil Test EPT
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->hasil_test_ept)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->hasil_test_ept) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        10
                                                    </td>
                                                    <td>
                                                        Bukti Pembayaran, Melunasi Kewajiban Keuangan/Hutang Disemester
                                                        Terakhir
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->bukti_pembayaran)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->bukti_pembayaran) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        11
                                                    </td>
                                                    <td>
                                                        Surat Ganti Nama
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->surat_ganti_nama)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->surat_ganti_nama) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td>
                                                        Form Biodata Peserta Yudisum
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->form_biodata_peserta_yudisium)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->form_biodata_peserta_yudisium) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        13
                                                    </td>
                                                    <td>
                                                        Sertifikat Keahlian
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->sertifikat_keahlian)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->sertifikat_keahlian) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        14
                                                    </td>
                                                    <td>
                                                        Poster Ukuran A3
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->poster_a3)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->poster_a3) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        15
                                                    </td>
                                                    <td>
                                                        Buku Tugas Akhir Yang Telah Disahkan
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->buku_tugas_akhir_sah)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->buku_tugas_akhir_sah) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        16
                                                    </td>
                                                    <td>Jurnal Penelitian
                                                    </td>
                                                    <td>
                                                        <?php if(empty($d->jurnal_penelitian)) { ?>
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                        <?php } else { ?>
                                                        <a target="_blank"
                                                            href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->jurnal_penelitian) }}"
                                                            class="btn btn-icon icon-left btn-dark"><i
                                                                class="far fa-file"></i> Lihat</a>
                                                        <?php } ?>
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
                    <?php } ?>
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
