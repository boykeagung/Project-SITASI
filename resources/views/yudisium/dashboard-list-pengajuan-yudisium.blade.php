@extends('layouts.layout-dashboard')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('navbar')

            <?php if(Auth::user()->level == "koordinator-yudisium") { ?>
            @include('sidebar.sidebar-koordinator-yudisium')
            <?php } else if(Auth::user()->level == "tu") { ?>
            @include('sidebar.tata-usaha')
            <?php } ?>

            <!-- Main Content -->

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Daftar Permintaan Yudisium</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active">
                                <?php if(Auth::user()->level == "koordinator-yudisium") { ?>
                                <a href="{{ URL::to('/dashboard-koordinator-yudisium') }}">
                                    Dashboard
                                </a>
                                <?php } else if(Auth::user()->level == "tu") { ?>
                                <a href="{{ URL::to('/dashboard-tata-usaha') }}">
                                    Dashboard
                                </a>
                                <?php } ?>
                            </div>
                            <div class="breadcrumb-item">
                                Konfirmasi Berkas Yudisium
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="wizard-steps">
                        <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                                <i class="fas fa-inbox"></i>
                            </div>
                            <div class="wizard-step-label">
                                Mahasiswa Mengajukan Permintaan
                            </div>
                        </div>
                        <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="wizard-step-label">
                                Tata Usaha Cek Berkas
                            </div>
                        </div>
                        <div class="wizard-step wizard-step-warning">
                            <div class="wizard-step-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="wizard-step-label">
                                Koordinator Yudisium Mengkonfirmasi
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="card card-primary">
                        <div class="collapse show" id="card-collapse">
                            <div class="card-body">
                                <table id="tabel" class="table table-hover border">
                                    <thead>
                                        <th scope="col">NRP</th>
                                        <th scope="col">Mahasiswa</th>
                                        <th scope="col">Progress Berkas</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($yudisium as $y) {
                                            $array = DB::table('yudisium')
                                                ->select('pas_foto', 'akta_kelahiran', 'ijasah_sekolah_menengah', 'judul_ta_id', 'judul_ta_en', 'bebas_pinjam_buku', 'transkrip_dari_sikad', 'resume_skk_dan_simskk', 'hasil_test_ept', 'bukti_pembayaran', 'surat_ganti_nama', 'form_biodata_peserta_yudisium', 'sertifikat_keahlian', 'poster_a3', 'buku_tugas_akhir_sah', 'jurnal_penelitian')
                                                ->where('nrp', $y->nrp)
                                                ->get();
                                            $sudah_upload = 0;
                                            $belum_upload = 0;
                                            $total_berkas = 16;
                                            foreach ($array as $item) {
                                                foreach ($item as $key => $value) {
                                                    if (is_null($value)) {
                                                        $belum_upload++;
                                                    } else {
                                                        $sudah_upload++;
                                                    }
                                                }
                                            }
                                            $rata_rata = number_format((float) ($sudah_upload / $total_berkas), 2, '.', '') * 100;
                                        ?>
                                        <tr>
                                            <td><?= $y->nrp ?></td>
                                            <td>
                                                <figure class="avatar avatar-sm  mr-2">
                                                    <img src="assets/img/avatar/avatar-3.png" alt="...">
                                                </figure>
                                                <?= $y->nama_lengkap ?>
                                            </td>

                                            <td>
                                                {{ $sudah_upload . '/' . $total_berkas . '. ' . $belum_upload . ' berkas lagi.' }}
                                                <div class="progress mt-2" data-height="25" style="height: 25px;">
                                                    <div class="progress-bar" role="progressbar"
                                                        data-width="{{ $rata_rata }}%"
                                                        aria-valuenow="{{ $rata_rata }}" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: {{ $rata_rata }}%;">
                                                        {{ $rata_rata }}%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">Diterima TU</span>
                                            </td>
                                            <td>
                                                <a href="<?= url()->current() . '/berkas/' . $y->nrp ?>"
                                                    class="btn btn-icon icon-left btn-info w-100">
                                                    <i class="far fa-file"></i> Lihat berkas
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@push('template-css')
@endpush

@push('plugins-css')
    <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
@endpush

@push('specific-js')
    <script src="/assets/modules/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
@endpush
