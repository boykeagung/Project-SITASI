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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Status Formulir</h4>
                                <div class="card-header-action">
                                    @if ($item->status_yudisium == 'Mengisi')
                                        <span class="badge badge-secondary">Status: Tahap Pengisian</span>
                                    @elseif ($item->status_yudisium == 'Diajukan')
                                        <span class="badge badge-warning">Status: Diajukan</span>
                                    @elseif ($item->status_yudisium == 'Dikonfirmasi TU')
                                        <span class="badge badge-primary">Status: Dikonfirmasi TU</span>
                                    @elseif ($item->status_yudisium == 'Diterima')
                                        <span class="badge badge-success">Status: Diterima</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12 col-lg-8">
                                <div class="section-title mb-5">Informasi Data Mahasiswa</div>
                                <div class="card profile-widget">
                                    <div class="profile-widget-header">
                                        <img alt="image"
                                            src="{{ asset('Yudisium/' . $item->nrp . '/' . $item->pas_foto) }}"
                                            class="rounded-circle profile-widget-picture"
                                            style="object-fit: cover;width:100px;height:100px;">
                                        <div class="profile-widget-items">
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">NRP</div>
                                                <div class="profile-widget-item-value">{{ $item->nrp }}</div>
                                            </div>
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">IPK</div>
                                                <div class="profile-widget-item-value">{{ $item->ipk }}</div>
                                            </div>
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">SKS</div>
                                                <div class="profile-widget-item-value">{{ $item->sks }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-widget-description">
                                        <div class="profile-widget-name mb-0">{{ $item->nama_lengkap }}
                                            <div class="text-muted d-inline font-weight-normal">
                                                <div class="slash"></div> {{ $item->email }}
                                            </div>
                                        </div>
                                        Lahir pada tanggal
                                        <strong>{{ date('j F Y', strtotime($item->tanggal_lahir)) }}</strong>,
                                        bertempat tinggal di
                                        <strong>{{ $item->alamat }}</strong>.
                                    </div>
                                    <div class="card-footer bg-whitesmoke">
                                        <a target="_blank" href="mailto:{{ $item->email }}"
                                            class="btn btn-icon icon-left btn-secondary text-dark mr-2 my-2"><i
                                                class="fas fa-envelope"></i> Email
                                        </a>
                                        <a target="_blank" href="https://wa.me/{{ $item->no_wa }}"
                                            class="btn btn-icon icon-left btn-secondary text-dark mr-2 my-2"><i
                                                class="fab fa-whatsapp"></i> WhatsApp
                                        </a>
                                        <a target="_blank" href="tel:{{ $item->no_hp }}"
                                            class="btn btn-icon icon-left btn-secondary text-dark mr-2 my-2"><i
                                                class="fas fa-phone"></i> {{ $item->no_hp }}
                                        </a>
                                    </div>
                                </div>
                                <div class="section-title">Berkas Mahasiswa</div>
                                <div class="mb-4">
                                    @if (!empty($item->pas_foto))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->pas_foto . '/' . $item->pas_foto));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->pas_foto) }}">
                                            <i class="fas fa-file"></i> Pas Foto Berwarna
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Pas Foto Berwarna
                                        </button>
                                    @endif
                                    @if (!empty($item->akta_kelahiran))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->akta_kelahiran . '/' . $item->akta_kelahiran));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->akta_kelahiran) }}">
                                            <i class="fas fa-file"></i> Akte Kelahiran
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Akte Kelahiran
                                        </button>
                                    @endif
                                    @if (!empty($item->ijasah_sekolah_menengah))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->ijasah_sekolah_menengah . '/' . $item->ijasah_sekolah_menengah));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->ijasah_sekolah_menengah) }}">
                                            <i class="fas fa-file"></i> Akte Kelahiran
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Akte Kelahiran
                                        </button>
                                    @endif
                                    @if (!empty($item->judul_ta_id))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->judul_ta_id . '/' . $item->judul_ta_id));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->judul_ta_id) }}">
                                            <i class="fas fa-file"></i> Judul Tugas Akhir (Bahasa Indonesia)
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Judul Tugas Akhir (Bahasa Indonesia)
                                        </button>
                                    @endif
                                    @if (!empty($item->judul_ta_en))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->judul_ta_en . '/' . $item->judul_ta_en));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->judul_ta_en) }}">
                                            <i class="fas fa-file"></i> Judul Tugas Akhir (Bahasa Inggris)
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Judul Tugas Akhir (Bahasa Inggris)
                                        </button>
                                    @endif
                                    @if (!empty($item->bebas_pinjam_buku))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->bebas_pinjam_buku . '/' . $item->bebas_pinjam_buku));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->bebas_pinjam_buku) }}">
                                            <i class="fas fa-file"></i> Bebas Pinjam Buku & Bukti Penyerahan Buku TA Dari
                                            Perpustakaan
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Bebas Pinjam Buku & Bukti Penyerahan Buku TA Dari
                                            Perpustakaan
                                        </button>
                                    @endif
                                    @if (!empty($item->transkrip_dari_sikad))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->transkrip_dari_sikad . '/' . $item->transkrip_dari_sikad));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->transkrip_dari_sikad) }}">
                                            <i class="fas fa-file"></i> Transkrip Dari Sikad
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Transkrip Dari Sikad
                                        </button>
                                    @endif
                                    @if (!empty($item->resume_skk_dan_simskk))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->resume_skk_dan_simskk . '/' . $item->resume_skk_dan_simskk));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->resume_skk_dan_simskk) }}">
                                            <i class="fas fa-file"></i> Resume SKK Dari Simskk
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Resume SKK Dari Simskk
                                        </button>
                                    @endif
                                    @if (!empty($item->hasil_test_ept))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->hasil_test_ept . '/' . $item->hasil_test_ept));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->hasil_test_ept) }}">
                                            <i class="fas fa-file"></i> Resume SKK Dari Simskk
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Resume SKK Dari Simskk
                                        </button>
                                    @endif
                                    @if (!empty($item->bukti_pembayaran))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->bukti_pembayaran . '/' . $item->bukti_pembayaran));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->bukti_pembayaran) }}">
                                            <i class="fas fa-file"></i> Bukti Pembayaran (Opsional)
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Bukti Pembayaran (Opsional)
                                        </button>
                                    @endif
                                    @if (!empty($item->surat_ganti_nama))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->surat_ganti_nama . '/' . $item->surat_ganti_nama));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->surat_ganti_nama) }}">
                                            <i class="fas fa-file"></i> Surat Ganti Nama (Opsional)
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Surat Ganti Nama (Opsional)
                                        </button>
                                    @endif
                                    @if (!empty($item->form_biodata_peserta_yudisium))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->form_biodata_peserta_yudisium . '/' . $item->form_biodata_peserta_yudisium));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->form_biodata_peserta_yudisium) }}">
                                            <i class="fas fa-file"></i> Form Biodata Peserta Yudisum
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Form Biodata Peserta Yudisum
                                        </button>
                                    @endif
                                    @if (!empty($item->sertifikat_keahlian))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->sertifikat_keahlian . '/' . $item->sertifikat_keahlian));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->sertifikat_keahlian) }}">
                                            <i class="fas fa-file"></i> Sertifikat Keahlian (Opsional)
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Sertifikat Keahlian (Opsional)
                                        </button>
                                    @endif
                                    @if (!empty($item->poster_a3))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->poster_a3 . '/' . $item->poster_a3));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->poster_a3) }}">
                                            <i class="fas fa-file"></i> Poster Ukuran A3
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Poster Ukuran A3
                                        </button>
                                    @endif
                                    @if (!empty($item->buku_tugas_akhir_sah))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->buku_tugas_akhir_sah . '/' . $item->buku_tugas_akhir_sah));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->buku_tugas_akhir_sah) }}">
                                            <i class="fas fa-file"></i> Buku Tugas Akhir Yang Telah Disahkan
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Buku Tugas Akhir Yang Telah Disahkan
                                        </button>
                                    @endif
                                    @if (!empty($item->jurnal_penelitian))
                                        <?php
                                        $infoPath = pathinfo(asset('Yudisium/' . $item->jurnal_penelitian . '/' . $item->jurnal_penelitian));
                                        $extension = $infoPath['extension'];
                                        ?>
                                        <a target="_blank" class="btn btn-primary btn-icon icon-left my-1 mr-1"
                                            href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->jurnal_penelitian) }}">
                                            <i class="fas fa-file"></i> Jurnal Penelitian
                                            <span class="badge badge-transparent">{{ $extension }}</span>
                                        </a>
                                    @else
                                        <button class="btn btn-dark btn-icon disabled icon-left my-1 mr-1">
                                            <i class="fas fa-file"></i> Jurnal Penelitian
                                        </button>
                                    @endif
                                </div>
                                <div class="section-title">Komentar Manajemen</div>
                                <div class="row pb-4">
                                    @if (!empty($item->komentar_tu))
                                        <div class="col-12 col-lg-6">
                                            <div class="pricing">
                                                <div class="pricing-title">
                                                    Tata Usaha
                                                </div>
                                                <div class="card-body text-left">
                                                    <p><em>{{ $item->komentar_tu }}</em></p>
                                                    <small>{{ date('j F Y, h:i a', strtotime($item->tanggal_modifikasi_tu)) }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($item->komentar_koordinator))
                                        <div class="col-12 col-lg-6">
                                            <div class="pricing">
                                                <div class="pricing-title">
                                                    Koordinator Yudisium
                                                </div>
                                                <div class="card-body text-left">
                                                    <p><em>{{ $item->komentar_koordinator }}</em></p>
                                                    <small>{{ date('j F Y, h:i a', strtotime($item->tanggal_modifikasi_koordinator)) }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col col-12 col-lg-4">
                                <div class="sticky-top py-4">
                                    <div class="card card-primary">
                                        <div class="card-header text-info">
                                            <i class="fas fa-clock mr-2"></i>
                                            <h4>Timeline</h4>
                                        </div>
                                        <div class="card-body"
                                            style="height: fit-content;max-height:500px; overflow-y: scroll; outline: none;">
                                            @if (!$detailAjuan->isEmpty())
                                                <div class="activities">
                                                    @foreach ($detailAjuan as $n)
                                                        <div class="activity">
                                                            <div
                                                                class="activity-icon bg-{{ $n->notifikasi_color }} text-white shadow-primary">
                                                                <i class="{{ $n->notifikasi_icon }}"></i>
                                                            </div>
                                                            <div class="activity-detail">
                                                                <div class="mb-2">
                                                                    <span class="text-job text-primary">
                                                                        {{ date('j F Y - h:i a', strtotime($n->notifikasi_time)) }}
                                                                    </span>
                                                                </div>
                                                                <p>{{ $n->notifikasi_message }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::open(['url' => url()->current() . '/aksi', 'id' => 'form-aksi']) }}
                        <input type="hidden" name="inputNrp" value="{{ $item->nrp }}">
                        @if (Auth::user()->level == 'tu')
                            <input type="hidden" name="inputBy" value="tu">
                        @elseif(Auth::user()->level == 'koordinator-yudisium')
                            <input type="hidden" name="inputBy" value="koor">
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="card card-primary">
                                    <div class="card-header text-primary">
                                        <i class="fas fa-user-check mr-2"></i>
                                        <h4>Hasil Cek Keabsahan</h4>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="form-group">
                                            <textarea id="inputKeabsahan" name="inputKomentar" class="form-control" aria-describedby="komentar"
                                                placeholder="Berikan komentar..." required>
                                                <?php if (!empty($item->komentar_tu)) {
                                                    echo $item->komentar_tu;
                                                } ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input checked type="radio" name="inputKeabsahan"
                                                        value="Dikonfirmasi TU" class="selectgroup-input">
                                                    <span id="inputKeabsahanTrue" class="selectgroup-button">Sah</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="inputKeabsahan" value="Mengisi"
                                                        class="selectgroup-input">
                                                    <span id="inputKeabsahanFalse" class="selectgroup-button">Tidak
                                                        Sah</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::user()->level == 'koordinator-yudisium')
                                <div class="col">
                                    <div class="card card-primary">
                                        <div class="card-header text-primary">
                                            <i class="fas fa-gavel mr-2"></i>
                                            <h4>Hasil Keputusan Formulir</h4>
                                        </div>
                                        <div class="card-body pb-0">
                                            <div class="form-group">
                                                <textarea id="inputKeputusan" name="inputKomentar" class="form-control" aria-describedby="komentar"
                                                    placeholder="Berikan komentar..." required>
                                                <?php if (!empty($item->komentar_koordinator)) {
                                                    echo $item->komentar_koordinator;
                                                } ?>
                                            </textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="inputKeputusan" value="Diterima"
                                                            class="selectgroup-input" checked>
                                                        <span id="inputKeputusanTrue"
                                                            class="selectgroup-button">Diterima</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="inputKeputusan" value="Mengisi"
                                                            class="selectgroup-input">
                                                        <span id="inputKeputusanFalse"
                                                            class="selectgroup-button">Ditolak</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <span id="kirim-keputusan" class="btn btn-lg btn-primary w-100 mb-4" data-toggle="tooltip"
                            data-placement="top"
                            data-original-title="Pastikan semua persyaratan sudah di cek">Konfirmasi</span>

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
        //
        $("#kirim-keputusan").click(function() {
            Swal.fire({
                title: 'Konfirmasi Aksi',
                text: "Hindari kesalahan dengan mengecek kembali komentar dan aksi",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#6777ef',
                cancelButtonColor: '#fc544b',
                confirmButtonText: 'Konfirmasi',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#form-aksi").submit();
                }
            })
        });
        //
        $("#inputKeabsahanTrue").click(function() {
            Swal.fire({
                title: 'Apakah Anda Ingin Menggunakan Template?',
                text: "Hindari pengetikan manual agar efisien :)",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#6777ef',
                cancelButtonColor: '#fc544b',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#inputKeabsahan').val(
                        'Kami dari pihak kampus dengan ini menyatakan bahwa kami telah memeriksa dan mengevaluasi formulir pendaftaran yudisium yang telah diajukan oleh calon peserta. Tunggu hasil keputusan koordinator yudisium.'
                    );
                }
            })
        });
        //
        $("#inputKeabsahanFalse").click(function() {
            Swal.fire({
                title: 'Apakah Anda Ingin Menggunakan Template?',
                text: "Hindari pengetikan manual agar efisien :)",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#6777ef',
                cancelButtonColor: '#fc544b',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#inputKeabsahan').val(
                        'Kami tidak dapat menyetujui formulir pendaftaran yudisium karena ada berkas yang disertakan tidak sah, yaitu <UBAH_DISINI> Kami memberikan rekomendasi agar calon peserta memperbaiki dan memenuhi seluruh persyaratan dan prosedur yang telah ditetapkan untuk mengikuti yudisium di masa yang akan datang.'
                    );
                }
            })
        });
        //
        $("#inputKeputusanTrue").click(function() {
            Swal.fire({
                title: 'Apakah Anda Ingin Menggunakan Template?',
                text: "Hindari pengetikan manual agar efisien :)",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#6777ef',
                cancelButtonColor: '#fc544b',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
                111111
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#inputKeputusan').val(
                        'Kami memberikan persetujuan untuk calon peserta mengikuti yudisium dan kami siap memberikan dukungan dan bantuan yang diperlukan selama proses yudisium berlangsung.'
                    );
                }
            })
        });
        //
        $("#inputKeputusanFalse").click(function() {
            Swal.fire({
                title: 'Apakah Anda Ingin Menggunakan Template?',
                text: "Hindari pengetikan manual agar efisien :)",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#6777ef',
                cancelButtonColor: '#fc544b',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#inputKeputusan').val(
                        'Kami dari pihak kampus dengan ini menyatakan bahwa kami tidak dapat menyetujui formulir pendaftaran yudisium yang telah diajukan oleh calon peserta. Hal ini dikarenakan <UBAH_DISINI>'
                    );
                }
            })
        });
    </script>
@endpush
