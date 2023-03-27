@extends('layouts.layout-dashboard')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('components.navbar')

            @include('sidebar.sidebar-dospem-dospenguji-ta')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Dasbor Yudisium Dosen</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active">
                                <a href="http://127.0.0.1:8000/dashboard-dosen-yudisium">
                                    Dashboard Dosen
                                </a>
                            </div>
                            <div class="breadcrumb-item">
                                Dasbor Yudisium Dosen
                            </div>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="wizard-steps pb-2">
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Review Ulang Pengajuan
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-file"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Beri Aksi
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-warning">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-upload"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Konfirmasi Aksi
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Dasbor Koordinator Yudisium</h4>
                                <div class="card-header-form">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <th>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        data-checkbox-role="dad" class="custom-control-input"
                                                        id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Mahasiswa</th>
                                            <th>Program Studi</th>
                                            <th>Whatsapp</th>
                                            <th>Status Berkas</th>
                                            <th>Status Yudisium</th>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="row">
                                                    <div class="col col-lg-2">
                                                        <figure class="avatar mr-2 avatar-sm">
                                                            <img src="assets/img/avatar/avatar-3.png" alt="...">
                                                        </figure>
                                                    </div>
                                                    <div class="col col-lg-10">
                                                        <div class="font-weight-bold">
                                                            Rizal Fakhri Romadona
                                                        </div>
                                                        <div class="text-job">16202937</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                Sistem Informasi
                                            </td>
                                            <td class="align-middle"><a href="#"
                                                    class="btn w-100 btn-success btn-icon icon-left"><i
                                                        class="fab fa-whatsapp"></i> Message</a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="#" class="w-100 btn btn-icon btn-dark">
                                                    <i class="far fa-file"></i> Lihat dokumen
                                                </a>
                                            </td>
                                            <td class="align-middle d-flex align-items-center">
                                                <a href="#" class="btn w-100 btn-icon icon-left btn-danger mr-1">
                                                    <i class="fas fa-times"></i> Tolak
                                                </a>
                                                <a href="#" class="btn w-100 btn-icon icon-left btn-primary ml-1">
                                                    <i class="fas fa-check"></i> Terima
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer bg-whitesmoke d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                </section>
                @include('components.footer')
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
