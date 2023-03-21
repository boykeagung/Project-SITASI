@extends('layouts.layout-dashboard')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('components.navbar')

            @include('sidebar.sidebar-tata-usaha')


            <div class="main-content">

                <div class="wizard-steps">
                    <div class="wizard-step">
                        <div class="wizard-step-icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <div class="wizard-step-label">
                            Permohonan Masuk
                        </div>
                    </div>
                    <div class="wizard-step">
                        <div class="wizard-step-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="wizard-step-label">
                            Cek Permohonan
                        </div>
                    </div>
                    <div class="wizard-step">
                        <div class="wizard-step-icon">
                            <i class="fas fa-upload"></i>
                        </div>
                        <div class="wizard-step-label">
                            Lanjutkan ke Koordinator
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Permintaan Yudisium</h4>
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
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                    class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>NIK</th>
                                        <th>Mahasiswa</th>
                                        <th>Program Studi</th>
                                        <th>Jadwal Yudisium</th>
                                        <th>Status TA</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            12346
                                        </td>
                                        <td class="align-middle">
                                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-3"
                                                width="35" data-toggle="tooltip" title=""
                                                data-original-title="Nur Alpiana"> Nur Alpiana
                                        </td>
                                        <td class="align-middle">Sistem Informasi</td>
                                        <td class="align-middle">
                                            <div class="text-primary"><b>18 Agustus 2023</b></div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="badge badge-success">Lulus</div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-danger">Batalkan</button>
                                                <button type="button" class="btn btn-secondary">Edit</button>
                                                <button type="button" class="btn btn-primary">Setujui</button>
                                              </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
