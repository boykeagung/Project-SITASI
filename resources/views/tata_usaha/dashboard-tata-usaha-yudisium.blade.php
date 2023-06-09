@extends('layouts.layout-dashboard')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('navbar')

            @include('sidebar.sidebar-tata-usaha')

            <div class="main-content ">
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
                                Cek Berkas Yudisium
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
                                Permohonan Masuk
                            </div>
                        </div>
                        <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="wizard-step-label">
                                Cek Permohonan
                            </div>
                        </div>
                        <div class="wizard-step wizard-step-warning">
                            <div class="wizard-step-icon">
                                <i class="fas fa-upload"></i>
                            </div>
                            <div class="wizard-step-label">
                                Lanjutkan ke Koordinator
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section position-sticky">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Daftar Permintaan Yudisium</h4>
                            <div class="card-header-action">
                                <a data-collapse="#card-collapse" class="btn btn-icon btn-info" href="#"><i
                                        class="fas fa-minus"></i></a>
                            </div>
                        </div>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                            <div class="collapse show" id="card-collapse" style="">
                                <div class="card-body p-0">
                                    <form>
                                        <div class="p-4">
                                            <div class="row">
                                                <div class="col col-12 col-lg-3 my-2">
                                                    <select name="" class="form-control">
                                                        <option>Urut dari terbaru</option>
                                                        <option>Urut dari terlama</option>
                                                    </select>
                                                </div>
                                                <div class="col col-12 col-lg-3 my-2">
                                                    <select name="" class="form-control">
                                                        <option>Semua</option>
                                                        <option>Progress</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                                <div class="col col-12 col-lg-3 my-2">
                                                    <select name="" class="form-control">
                                                        <option>25 baris</option>
                                                        <option>50 baris</option>
                                                        <option>75 baris</option>
                                                        <option>100 baris</option>
                                                        <option>250 baris</option>
                                                        <option>500 baris</option>
                                                    </select>
                                                </div>
                                                <div class="col col-12 col-lg-3 my-2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Search">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary"><i
                                                                    class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-striped   ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                data-checkbox-role="dad" class="custom-control-input"
                                                                id="checkbox-all">
                                                            <label for="checkbox-all"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                    <th scope="col">NRP</th>
                                                    <th scope="col">Mahasiswa</th>
                                                    <th scope="col">Progress Berkas</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($yudisium as $y) { ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                data-checkbox-role="dad" class="custom-control-input"
                                                                id="checkbox-all">
                                                            <label for="checkbox-all"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                    <td><?= $y->nrp ?></td>
                                                    <td>
                                                        <figure class="avatar avatar-sm  mr-2">
                                                            <img src="assets/img/avatar/avatar-3.png" alt="...">
                                                        </figure>
                                                        <?= $y->nama_lengkap ?>
                                                    </td>
                                                    <td>
                                                        <div class="progress" data-height="25" style="height: 25px;">
                                                            <div class="progress-bar" role="progressbar" data-width="25%"
                                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 25%;">25%</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-danger">Ditolak</span>
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
                                    <nav class="d-flex justify-content-center" aria-label="...">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">Prev</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2 <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </form>
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
