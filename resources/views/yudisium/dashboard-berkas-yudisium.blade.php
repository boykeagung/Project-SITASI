@extends('layouts.layout-dashboard')

@section('page', 'SITASI')
@section('title', 'Detail Pengajuan')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('navbar')

            @if (Auth::user()->level == 'koordinator-yudisium')
                @include('sidebar.sidebar-koordinator-yudisium')
            @elseif(Auth::user()->level == 'tu')
                @include('sidebar.sidebar-tata-usaha')
            @endif

            @foreach ($data as $item)
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
                            <div class="wizard-step wizard-step-active" data-toggle="tooltip"
                                data-original-title="Cek kembali berkas persyaratan yang sudah dicek tata usaha">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-user-check"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Cek Syarat & Komentar TU
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
                                data-original-title="Setelah kirim hasil mahasiswa akan menerima notifikasi web, untuk berjaga kabari juga mahasiswa melalui WhatsApp">
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
                                data-original-title="Setelah kirim hasil mahasiswa akan menerima notifikasi web, untuk berjaga kabari juga mahasiswa melalui WhatsApp">
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
                                        <i class="fas fa-user-check mr-2"></i>
                                        <h4>Biodata Mahasiswa</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered m-0">
                                            <tbody>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">Foto
                                                    </td>
                                                    <td class="d-flex justify-content-between align-items-center">
                                                        <figure class="avatar">
                                                            <img src="<?= $item->nrp ?>">
                                                        </figure>
                                                        <a href="#" class="btn btn-primary btn-icon icon-left">
                                                            <i class="fas fa-expand-arrows-alt"></i> Perjelas</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">NRP
                                                    </td>
                                                    <td><?= $item->nrp ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">Nama
                                                        Lengkap
                                                    </td>
                                                    <td><?= $item->nama_lengkap ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">Tanggal
                                                        Lahir
                                                    </td>
                                                    <td><?= $item->tanggal_lahir ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">No. HP
                                                    </td>
                                                    <td class="d-flex justify-content-between align-items-center">
                                                        <?= $item->no_hp ?>
                                                        <a target="_blank"
                                                            href="https://wa.me/<?= $item->no_hp ?>?text=Halo%<?= $item->nama_lengkap ?>%20silahkan%20cek%20notifikasi%20website%20SITASI,%20ada%20pemberitahuan%20baru%20mengenai%20pengajuan%20yudisium%20Anda."
                                                            class="btn btn-success btn-icon icon-left">
                                                            <i class="fab fa-whatsapp"></i> WhatsApp</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">Email
                                                    </td>
                                                    <td class="d-flex justify-content-between align-items-center">
                                                        <?= $item->email ?>
                                                        <a target="_blank" href="mailto:<?= $item->email ?>"
                                                            class="btn btn-primary btn-icon icon-left">
                                                            <i class="fas fa-at"></i> Email</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">IPK
                                                    </td>
                                                    <td><?= $item->ipk ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="white-space: nowrap;width: 1%;font-weight: bold;">SKS
                                                    </td>
                                                    <td><?= $item->sks ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <i class="fas fa-file mr-2"></i>
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
                                                            <?php if(empty($item->pas_foto)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->pas_foto) }}"
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
                                                            <?php if(empty($item->akta_kelahiran)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->akta_kelahiran) }}"
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
                                                            <?php if(empty($item->ijasah_sekolah_menengah)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->ijasah_sekolah_menengah) }}"
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
                                                            <?php if(empty($item->judul_ta_id)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->judul_ta_id) }}"
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
                                                            <?php if(empty($item->judul_ta_en)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->judul_ta_en) }}"
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
                                                            <?php if(empty($item->bebas_pinjam_buku)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->bebas_pinjam_buku) }}"
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
                                                            <?php if(empty($item->transkrip_dari_sikad)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->transkrip_dari_sikad) }}"
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
                                                            <?php if(empty($item->resume_skk_dan_simskk)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->resume_skk_dan_simskk) }}"
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
                                                            <?php if(empty($item->hasil_test_ept)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->hasil_test_ept) }}"
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
                                                            <?php if(empty($item->bukti_pembayaran)) { ?>
                                                            <span class="badge badge-primary">Opsional</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->bukti_pembayaran) }}"
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
                                                            <?php if(empty($item->surat_ganti_nama)) { ?>
                                                            <span class="badge badge-primary">Opsional</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->surat_ganti_nama) }}"
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
                                                            <?php if(empty($item->form_biodata_peserta_yudisium)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->form_biodata_peserta_yudisium) }}"
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
                                                            <?php if(empty($item->sertifikat_keahlian)) { ?>
                                                            <span class="badge badge-primary">Opsional</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->sertifikat_keahlian) }}"
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
                                                            <?php if(empty($item->poster_a3)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->poster_a3) }}"
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
                                                            <?php if(empty($item->buku_tugas_akhir_sah)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->buku_tugas_akhir_sah) }}"
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
                                                            <?php if(empty($item->jurnal_penelitian)) { ?>
                                                            <span class="badge badge-danger">Tidak ada</span>
                                                            <?php } else { ?>
                                                            <a target="_blank"
                                                                href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->jurnal_penelitian) }}"
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
                                    <div class="section-title">Informasi Pengajuan</div>
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <i class="fas fa-info-circle mr-2"></i>
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
                                                            <?= !empty($item->status_yudisium) ? $item->status_yudisium : 'Pengisian formulir' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            Tanggal Diajukan
                                                        </td>
                                                        <td>
                                                            <?= !empty($item->tanggal_modifikasi_mahasiswa) ? date('d-M-Y h:i:s a', strtotime($item->tanggal_modifikasi_mahasiswa)) : 'Belum ada aksi' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            Tanggal
                                                            Modifikasi TU</td>
                                                        <td>
                                                            <?= !empty($item->tanggal_modifikasi_tu) ? date('d-M-Y h:i:s a', strtotime($item->tanggal_modifikasi_tu)) : 'Belum ada aksi' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="white-space: nowrap;width: 1%;font-weight: bold;">
                                                            Tanggal
                                                            Modifikasi
                                                            Koor</td>
                                                        <td>
                                                            <?= !empty($item->tanggal_modifikasi_koordinator) ? $item->tanggal_modifikasi_koordinator : 'Belum ada aksi' ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{ Form::open(['url' => url()->current() . '/aksi']) }}
                        <div class="section-title">Aksi</div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <i class="fas fa-paper-plane mr-2"></i>
                                <h4>Aksi</h4>
                            </div>
                            <div class="card-body pb-0">
                                <p>Mahasiswa akan menerima notifikasi hasil aksi via web SITASI, jika ingin melakukan
                                    via
                                    WhatsApp
                                    messengger anda dapat melihat seksi biodata.</p>
                                @if (Auth::user()->level == 'koordinator-yudisium')
                                    <input type="hidden" name="inputBy" value="koor">
                                    <input type="hidden" name="inputNrp" value="{{ $item->nrp }}">
                                    <div class="form-group">
                                        <label class="form-label">Komentar Tata Usaha</label>
                                        <blockquote>
                                            <?= !empty($item->komentar_tu) ? $item->komentar_tu : 'Belum ada komentar' ?>
                                        </blockquote>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Komentar Koordinator Yudisium</label>
                                        <textarea name="inputKomentar" class="form-control" aria-describedby="komentar"
                                            placeholder="Komentar yang berkaitan dengan hasil akhir pengecekan..." required>
                                            <?php if (!empty($item->komentar_koor)) {
                                                echo $item->komentar_koor;
                                            } ?>
                                            </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Keputusan</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="inputKeputusan" value="Diterima"
                                                    class="selectgroup-input" checked>
                                                <span class="selectgroup-button">Diterima</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="inputKeputusan" value="Mengisi"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Ditolak</span>
                                            </label>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                @elseif(Auth::user()->level == 'tu')
                                    <input type="hidden" name="inputBy" value="tu">
                                    <input type="hidden" name="inputNrp" value="{{ $item->nrp }}">
                                    <div class="form-group">
                                        <label class="form-label">Komentar Tata Usaha</label>
                                        <textarea name="inputKomentar" class="form-control"
                                            aria-describedby="komentar"placeholder="Komentar yang berkaitan dengan hasil akhir pengecekan..." required><?php if (!empty($item->komentar_tu)) {
                                                echo $item->komentar_tu;
                                            } ?>
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Keputusan</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="inputKeputusan" value="Dikonfirmasi TU"
                                                    class="selectgroup-input" checked>
                                                <span class="selectgroup-button">Lanjutkan ke Koordinator</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="inputKeputusan" value="Mengisi"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Tolak</span>
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <input class="card-footer btn btn-primary bg-primary" type="submit" value="Kirim"
                                onclick="return confirm('Apakah semua berkas sudah anda cek dan benar?')"
                                @if ($item->status_yudisium != 'Dikonfirmasi TU' && Auth::user()->level == 'koordinator-yudisium') disabled @endif>
                        </div>
                        {{ Form::close() }}
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
    <script>
        $(document).ready(function() {
            $('textarea').each(function() {
                $(this).val($(this).val().trim());
            });
        });
    </script>
@endpush
