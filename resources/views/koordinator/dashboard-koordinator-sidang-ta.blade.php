@extends('layout.layout-koordinator-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-koordinator-ta')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Pendaftar Sidang Tugas Akhir</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NRP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Judul TA</th>
                                            <th>Files</th>
                                            <th>Status Approval</th>
                                            <th>Jadwal Sidang</th>
                                            <th>Dosen Penguji 1</th>
                                            <th>Dosen Penguji 2</th>
                                            <th>Changes</th>
                                            <th>Timestamp Penyimpanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width:5%">1</td>
                                            <td>162018003</td>
                                            <td>Muhammad Fasha Patria</td>
                                            <td>Pembuatan Website Manajemen Tugas Akhir</td>
                                            <td><a href="#" class="btn btn-primary" target="_blank"><i
                                                        class="fas fa-eye"></i> Lihat Draft</a>
                                                <a href="#" class="btn btn-primary mt-2" target="_blank"><i
                                                        class="fas fa-eye"></i> Lihat Form Pengajuan Sidang</a>
                                            </td>
                                            <td class="text-center" width="160px">
                                                <select name="status_approval" class="form-control" required>
                                                    <option value="">- Pilih -</option>
                                                    <option value="">Approved</option>
                                                    <option value="">Ditolak</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="datetime-local" class="form-control">
                                            </td>
                                            <td class="text-center" width="160px">
                                                <select name="status_approval" class="form-control" required>
                                                    <option value="">- Pilih -</option>
                                                    <option value="">Dosen 1</option>
                                                    <option value="">Dosen 2</option>
                                                </select>
                                            </td>
                                            <td class="text-center" width="160px">
                                                <select name="status_approval" class="form-control" required>
                                                    <option value="">- Pilih -</option>
                                                    <option value="">Dosen 1</option>
                                                    <option value="">Dosen 2</option>
                                                </select>
                                            </td>
                                            <td><button type="submit" name="save-data"
                                                    class="btn btn-primary">Save</button>
                                            </td>
                                            <td>DD/MM/YYYY</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            @include('footer')

        </div>
    </div>
</div>
@endsection