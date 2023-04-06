@extends('layouts.layout-dashboard')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('navbar')

            <?php if(Auth::user()->level == "koordinator-yudisium") { ?>
            @include('sidebar.sidebar-koordinator-yudisium')
            <?php } else if(Auth::user()->level == "tu") { ?>
            @include('sidebar.sidebar-tata-usaha')
            <?php } ?>

            @foreach ($data as $d)
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>Cek Berkas Yudisium</h1>
                            <?php if(Auth::user()->level == "koordinator-yudisium") { ?>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb-item active">
                                    <a href="{{ url('/dashboard-koordinator-yudisium') }}">
                                        Dashboard Koordinator Yudisium
                                    </a>
                                </div>
                                <div class="breadcrumb-item">
                                    Detail Permintaan Yudisium
                                </div>
                            </div>
                            <?php } else if(Auth::user()->level == "tu") { ?>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb-item active">
                                    <a href="{{ url('/dashboard-tata-usaha') }}">
                                        Dashboard TU
                                    </a>
                                </div>
                                <div class="breadcrumb-item">
                                    Detail Permintaan Yudisium
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </section>
                    <section class="section">
                        <div class="section-title">Tata Cara</div>
                        <?php if(Auth::user()->level == "koordinator-yudisium") { ?>
                        <div class="wizard-steps">
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Order Placed
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Payment Completed
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Product Shipped
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-success">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Order Completed
                                </div>
                            </div>
                        </div>
                        <?php } else if(Auth::user()->level == "tu") { ?>
                        <div class="wizard-steps">
                            <div class="wizard-step wizard-step-active" data-toggle="tooltip"
                                data-original-title="Cek keabsahan biodata dan keabsahan berkas persyaratan yudisium yang telah diupload oleh mahasiswa">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-user-check"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Cek Biodata & Berkas
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-active" data-toggle="tooltip"
                                data-original-title="Berikan komentar mengenai ditolaknya/diterimanya pengajuan persyaratan mahasiswa">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-comment"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Berikan Komentar
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-active" data-toggle="tooltip"
                                data-original-title="Jika diterima maka dilanjutkan ke koordinator yudisium, bila ditolak maka mahasiswa akan memperbaiki persyaratan">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Kirim Hasil
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-info" data-toggle="tooltip"
                                data-original-title="Pekerjaan untuk pengajuan ini selesai! ulangi jika menerima notifikasi pengajuan dari mahasiswa lain lagi.">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Selesai!
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col col-12 col-lg-8 pt-1">
                                <div class="section-title">Biodata & Berkas</div>
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4>Biodata Mahasiswa</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered m-0">
                                            <tbody>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">Foto
                                                    </td>
                                                    <td>
                                                        <figure class="avatar">
                                                            <img src="<?= $d->nrp ?>">
                                                        </figure>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">NRP
                                                    </td>
                                                    <td><?= $d->nrp ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">Nama
                                                        Lengkap
                                                    </td>
                                                    <td><?= $d->nama_lengkap ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">Tanggal
                                                        Lahir
                                                    </td>
                                                    <td><?= $d->tanggal_lahir ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">No. HP
                                                    </td>
                                                    <td><?= $d->no_hp ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">Email
                                                    </td>
                                                    <td><?= $d->email ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">IPK
                                                    </td>
                                                    <td><?= $d->ipk ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">SKS
                                                    </td>
                                                    <td><?= $d->sks ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4>Berkas Mahasiswa</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            10
                                                        </td>
                                                        <td>
                                                            Bukti Pembayaran, Melunasi Kewajiban Keuangan/Hutang
                                                            Disemester
                                                            Terakhir
                                                        </td>
                                                        <td>
                                                            <?php if(empty($d->bukti_pembayaran)) { ?>
                                                            <span class="badge badge-primary">Opsional</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->bukti_pembayaran) }}"
                                                                class="btn btn-icon icon-left btn-dark"><i
                                                                    class="far fa-file"></i> Lihat</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            11
                                                        </td>
                                                        <td>
                                                            Surat Ganti Nama
                                                        </td>
                                                        <td>
                                                            <?php if(empty($d->surat_ganti_nama)) { ?>
                                                            <span class="badge badge-primary">Opsional</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->surat_ganti_nama) }}"
                                                                class="btn btn-icon icon-left btn-dark"><i
                                                                    class="far fa-file"></i> Lihat</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            13
                                                        </td>
                                                        <td>
                                                            Sertifikat Keahlian
                                                        </td>
                                                        <td>
                                                            <?php if(empty($d->sertifikat_keahlian)) { ?>
                                                            <span class="badge badge-primary">Opsional</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $d->nrp . '/' . $d->sertifikat_keahlian) }}"
                                                                class="btn btn-icon icon-left btn-dark"><i
                                                                    class="far fa-file"></i> Lihat</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
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
                                </div>
                            </div>
                            <div class="col col-12 col-lg-4">
                                <div class="sticky-top pt-1">
                                    <div class="section-title">Data Pengajuan</div>
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h4>Informasi Permintaan</h4>
                                        </div>
                                        <div class="card-body p-0">
                                            <table class="table table-bordered m-0">
                                                <tbody>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            Status
                                                            Yudisium</td>
                                                        <td>
                                                            <?= !empty($d->status_yudisium) ? $d->status_yudisium : 'Pengisian formulir' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            Tanggal
                                                            Modifikasi Mahasiswa
                                                        </td>
                                                        <td>
                                                            <?= !empty($d->tanggal_modifikasi_mahasiswa) ? $d->tanggal_modifikasi_mahasiswa : '-' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            Tanggal
                                                            Modifikasi Tata
                                                            Usaha</td>
                                                        <td>
                                                            <?= !empty($d->tanggal_modifikasi_tu) ? $d->tanggal_modifikasi_tu : '-' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            Tanggal
                                                            Modifikasi
                                                            Koordinator Yudisium</td>
                                                        <td>
                                                            <?= !empty($d->tanggal_modifikasi_koordinator) ? $d->tanggal_modifikasi_koordinator : '-' ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-title">Hasil</div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h4>Berikan komentar dan hasil</h4>
                            </div>
                            <div class="card-body">
                                <?php if(Auth::user()->level == "koordinator-yudisium") { ?>
                                TODO:
                                <?php } else if(Auth::user()->level == "tu") { ?>
                                <div class="form-group">
                                    <textarea class="form-control" aria-describedby="komentar"
                                        placeholder="Berikan komentar mengenai diterima/ditolaknya biodata dan berkas ..." required></textarea>
                                </div>
                                <label class="mr-2">Dari hasil pengecekan persyaratan yang dilakukan tata usaha maka
                                    pengajuan</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="inputDiterima" name="inputStatusYudisium"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="inputDiterima" required>Diterima</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="inputDitolak" name="inputStatusYudisium"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="inputDitolak">Ditolak</label>
                                </div>
                                <?php } ?>
                            </div>
                            <input class="card-footer btn btn-info bg-info" type="submit" value="Kirim Hasil"
                                onclick="return confirm('Apakah semua berkas sudah anda cek dan benar?')">
                        </div>
                    </section>
                </div>
            @endforeach
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
