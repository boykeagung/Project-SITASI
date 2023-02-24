@extends('layout.layout-tata-usaha')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-tata-usaha')

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
                                            <th>Status Approval</th>
                                            <th>Jadwal Sidang</th>
                                            <th>Dosen Penguji 1</th>
                                            <th>Dosen Penguji 2</th>
                                            <th>Nilai</th>
                                            <th>Files</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width:5%">1</td>
                                            <td>162018003</td>
                                            <td>Muhammad Fasha Patria</td>
                                            <td>Pembuatan Website Manajemen Tugas Akhir</td>
                                            <td>
                                                <!--BAGIAN INI SESUAIKAN DENGAN APPROVAL DARI KOORDINATOR TA-->
                                                <!-- <button class="btn btn-warning" disabled>Menunggu</button> -->
                                                <button class="btn btn-success" disabled>Approved</button>
                                                <!--<button class="btn btn-danger" disabled>Di Tolak</button>-->
                                            </td>
                                            <td>DD-MM-YYYY</td>
                                            <td width="160px">Dosen Penguji 1</td>
                                            <td width="160px">Dosen Penguji 2</td>
                                            <td><a href="#" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i>
                                                    Lihat Nilai</a></td>
                                            <td width="160px">
                                                <a href="upload-berita-acara.html" class="btn btn-primary mb-2"><i
                                                        class="fas fa-plus"></i>
                                                    Upload Berita Acara Sidang</a>
                                                <a href="#" class="btn btn-primary" target="_blank"><i
                                                        class="fas fa-eye"></i> Lihat BAP Dengan Nilai</a>
                                            </td>
                                            <td><button type="submit" name="save-data"
                                                    class="btn btn-primary">Save</button></td>
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
