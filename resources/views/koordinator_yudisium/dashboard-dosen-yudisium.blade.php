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
                                    Setuju Atau Batalkan Pengajuan
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-warning">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-upload"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Kirim Noti
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
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Program Studi</th>
                                            <th>Whatsapp</th>
                                            <th>Status Yudisium</th>
                                            <th>Jadwal Yudisium</th>
                                            <th>Status Berkas</th>
                                            <th>Aksi</th>
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
                                                <b>162019030</b>
                                            </td>
                                            <td class="align-middle">Muhammad Restu Nubiyanto Saputra
                                            </td>
                                            <td class="align-middle">Sistem Informasi</td>
                                            <td class="align-middle"><a href="#"
                                                    class="btn btn-success btn-icon icon-left"><i
                                                        class="fab fa-whatsapp"></i> Message</a>
                                            </td>
                                            <td class="align-middle">
                                                <div class="text-primary"><b>Diterima</b></div>
                                            </td>
                                            <td class="align-middle">
                                                18 Agustus 2023
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" data-width="75%"
                                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 75%;">75%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-info dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu dropleft" x-placement="left-start"
                                                        style="position: absolute; transform: translate3d(-202px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item text-primary" href="#">Setujui</a>
                                                        <a class="dropdown-item text-danger" href="#">Batalkan</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
