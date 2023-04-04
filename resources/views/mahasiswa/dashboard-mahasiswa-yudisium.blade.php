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
                        <div class="wizard-steps">
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Isi Form Mahasiswa
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-file"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Isi Form Persyaratan
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-warning">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-upload"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Kirim Pengajuan
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($collection as $item)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="py-2 sticky-top">
                                        <form id="form-1" action="{{ url()->current() }}/update-mahasiswa"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="inputNrp" value="{{ $item->nrp }}">
                                            <div class="card card-primary">
                                                <input type="hidden" name="user_id" value=""
                                                    placeholder="Fill with your 222" required>
                                                <div class="card-header">
                                                    <h4>Form Mahasiswa</h4>
                                                    <div class="card-header-action">
                                                        <a data-collapse="#formulir-mahasiswa-collapse"
                                                            class="btn btn-icon btn-info" href="#"><i
                                                                class="fas fa-minus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="collapse show" id="formulir-mahasiswa-collapse">
                                                    <div class="card-body">
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>NRP</label>
                                                                <div class="form-control">{{ $item->nrp }}</div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputNama">Nama Lengkap</label>
                                                                <input type="text" class="form-control" id="inputNama"
                                                                    name="inputNama" value="{{ $item->name }}"
                                                                    placeholder="Fill with your full name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail">Email</label>
                                                            <input type="email" class="form-control" id="inputEmail"
                                                                name="inputEmail" value="{{ $item->email }}"
                                                                placeholder="Fill with your email" required>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputTanggalLahir">Tanggal Lahir</label>
                                                                <input type="date" class="form-control"
                                                                    id="inputTanggalLahir" name="inputTanggalLahir"
                                                                    value="{{ $item->tanggal_lahir }}" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputTelepon">Nomor Telepon</label>
                                                                <input type="text" class="form-control" id="inputTelepon"
                                                                    name="inputTelepon" value="{{ $item->no_hp }}"
                                                                    placeholder="Fill with your phone number" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAlamat">Alamat</label>
                                                            <textarea id="inputAlamat" name="inputAlamat" class="form-control" placeholder="Fill with your home address" required>{{ $item->alamat }}</textarea>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputIPK">IPK</label>
                                                                <input type="text" class="form-control" id="inputIPK"
                                                                    name="inputIPK" value="{{ $item->ipk }}"
                                                                    placeholder="Fill with your GPA" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputSKS">SKS</label>
                                                                <input type="text" class="form-control" id="inputSKS"
                                                                    name="inputSKS" value="{{ $item->sks }}"
                                                                    placeholder="Fill with your semester credit" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Ukuran Baju Toga</label>
                                                            <div class="selectgroup w-100">
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="inputToga" value="xs"
                                                                        class="selectgroup-input"
                                                                        {{ $item->toga == 'xs' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">XS</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="inputToga" value="s"
                                                                        class="selectgroup-input"
                                                                        {{ $item->toga == 's' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">S</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="inputToga" value="m"
                                                                        class="selectgroup-input"
                                                                        {{ $item->toga == 'm' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">M</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="inputToga" value="l"
                                                                        class="selectgroup-input"
                                                                        {{ $item->toga == 'l' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">L</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="inputToga" value="xl"
                                                                        class="selectgroup-input"
                                                                        {{ $item->toga == 'xl' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">XL</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="inputToga" value="xxl"
                                                                        class="selectgroup-input"
                                                                        {{ $item->toga == 'xxl' ? 'checked' : '' }}>
                                                                    <span class="selectgroup-button">XXL</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input class="card-footer btn btn-primary bg-primary" type="submit"
                                                    value="Save Edit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($collection as $item)
                                <div class="col-12 col-md-6 col-lg-8">
                                    <form id="form-2" action="{{ url()->current() }}/update-persyaratan"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="inputNrp" value="{{ $item->nrp }}">
                                        <div class="py-2">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4>Form Persyaratan</h4>
                                                    <div class="card-header-action">
                                                        <a data-collapse="#formulir-persyaratan-collapse"
                                                            class="btn btn-icon btn-info" href="#"><i
                                                                class="fas fa-minus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="collapse show" id="formulir-persyaratan-collapse">
                                                    <div class="card-body p-0">
                                                        <div class="table-responsive">
                                                            <table class="table mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th>Persyaratan</th>
                                                                        <th>Detail</th>
                                                                        <th>File</th>
                                                                        <th>Tipe</th>
                                                                        <th class="w-25">Upload</th>
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
                                                                        <td> <?php if ($item->pas_foto != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->pas_foto) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/pas_foto"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?>
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputPasFoto">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div>
                                                                            <?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->akta_kelahiran != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->akta_kelahiran) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/akta_kelahiran"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputAktaKelahiran">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->ijasah_sekolah_menengah != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->ijasah_sekolah_menengah) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/ijasah_sekolah_menengah"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputIjasahSekolahMenengah">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->judul_ta_id != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->judul_ta_id) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/judul_ta_id"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputJudulTugasAkhirIndonesia">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->judul_ta_en != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->judul_ta_en) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/judul_ta_en"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputJudulTugasAkhirInggris">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->bebas_pinjam_buku != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->bebas_pinjam_buku) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/bebas_pinjam_buku"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputBebasPinjamBuku">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->transkrip_dari_sikad != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->transkrip_dari_sikad) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/transkrip_dari_sikad"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputTranskripDariSikad">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->resume_skk_dan_simskk != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->resume_skk_dan_simskk) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/resume_skk_dan_simskk"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputResumeSkkDanSimskk">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->hasil_test_ept != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->hasil_test_ept) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/hasil_test_ept"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputHasilTestEpt">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->bukti_pembayaran != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->bukti_pembayaran) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/bukti_pembayaran"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputBuktiPembayaran">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->surat_ganti_nama != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->surat_ganti_nama) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/surat_ganti_nama"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputSuratGantiNama">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->form_biodata_peserta_yudisium != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->form_biodata_peserta_yudisium) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/form_biodata_peserta_yudisium"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputFormBiodataPesertaYudisium">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->sertifikat_keahlian != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->sertifikat_keahlian) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/sertifikat_keahlian"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputSertifikatKeahlian">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->poster_a3 != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->poster_a3) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/poster_a3"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputPoseterA3">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->buku_tugas_akhir_sah != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->buku_tugas_akhir_sah) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/buku_tugas_akhir_sah"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputBukuTugasAkhirSah">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
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
                                                                        <td>
                                                                            <?php if ($item->jurnal_penelitian != null) {?>
                                                                            <div class="btn-group d-flex justify-content-between"
                                                                                role="group">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('Yudisium/' . $item->nrp . '/' . $item->jurnal_penelitian) }}"
                                                                                    class="btn btn-icon text-primary icon-left pl-0"><i
                                                                                        class="far fa-file"></i> Lihat</a>
                                                                                <a href="{{ url()->current() }}/reset/{{ $item->nrp }}/jurnal_penelitian"
                                                                                    class="btn btn-icon text-danger icon-left"><i
                                                                                        class="fa fa-times"></i> Hapus</a>
                                                                            </div>
                                                                            <?php
                                                            }else{
                                                            ?> <div class="custom-file">
                                                                                <input type="file"
                                                                                    onchange="javascript:this.form.submit();"
                                                                                    class="custom-file-input"
                                                                                    name="inputJurnalPenelitian">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Choose
                                                                                    file</label>
                                                                            </div><?php
                                                            } ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Kirim Pengajuan</h4>
                            </div>
                            <div class="card-body">
                                <p>Sebelum mengirim pastikan semua file sesuai kriteria persyaratan Yudisium.</p>
                            </div>
                            <input class="card-footer btn btn-warning bg-warning" type="submit" value="Kirim">
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
