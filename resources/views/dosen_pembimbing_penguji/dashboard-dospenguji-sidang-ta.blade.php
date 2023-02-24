@extends('layout.layout-dospem-dospenguji-ta')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar-dospem-dospenguji-ta')
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Mahasiswa Sidang Tugas Akhir</h4>
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
                                            <th class="col-md-1">Status Approval</th>
                                            <th>Jadwal Sidang</th>
                                            <th class="col-md-1">Komentar</th>
                                            <th width="60px">Nilai</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width:5%">1</td>
                                            <td>162018004</td>
                                            <td>Fachri Achmad Maulana</td>
                                            <td>Pembuatan Website Manajemen Tugas Akhir</td>
                                            <td>
                                                <a href="#" class="btn btn-primary mb-2" target="_blank"><i
                                                        class="fas fa-eye"></i> Lihat Draft</a>
                                                <a href="#" class="btn btn-primary" target="_blank"><i
                                                        class="fas fa-eye"></i> Lihat Berita Acara</a>
                                            </td>
                                            <td>
                                                <!--BAGIAN INI SESUAIKAN DENGAN APPROVAL DARI KOORDINATOR TA-->
                                                <!-- <button class="btn btn-warning" disabled>Menunggu</button> -->
                                                <button class="btn btn-success" disabled>Approved</button>
                                                <!--<button class="btn btn-danger" disabled>Di Tolak</button>-->
                                            </td>
                                            <td>
                                                DD-MM-YYYY
                                            </td>
                                            <td>
                                                <div class="komentar-ta">
                                                    <a href="dospenguji-tulis-komentar.html"
                                                        class="btn btn-primary"><i class="fas fa-plus"></i>
                                                        Tulis Komentar</a>
                                                </div>
                                            </td>
                                            <!-- LIMIT DARI 1-100 -->
                                            <td>
                                                <div class="nilai-ta">
                                                    <a href="dospenguji-tambah-nilai.html"
                                                        class="btn btn-primary"><i class="fas fa-plus"></i>
                                                        Tambah Nilai</a>
                                                    <a href="#" class="btn btn-primary mt-2"><i
                                                            class="fas fa-eye"></i>
                                                        Lihat Nilai</a>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary">Save</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:5%">2</td>
                                            <td>162018006</td>
                                            <td>Alam Verdiansyah</td>
                                            <td>Pembuatan Website Manajemen Perpustakaan</td>
                                            <td>
                                                <a href="#" class="btn btn-primary mb-2" target="_blank"><i
                                                        class="fas fa-eye"></i> Lihat Draft</a>
                                                <a href="#" class="btn btn-primary" target="_blank"><i
                                                        class="fas fa-eye"></i> Lihat Berita Acara</a>
                                            </td>
                                            <td width="160px">
                                                <!--BAGIAN INI SESUAIKAN DENGAN APPROVAL DARI KOORDINATOR TA-->
                                                <!-- <button class="btn btn-warning" disabled>Menunggu</button> -->
                                                <button class="btn btn-success" disabled>Approved</button>
                                                <!--<button class="btn btn-danger" disabled>Di Tolak</button>-->
                                            </td>
                                            <td>
                                                DD-MM-YYYY
                                            </td>
                                            <td>
                                                <div class="komentar-ta">
                                                    <a href="dospenguji-tulis-komentar.html"
                                                        class="btn btn-primary"><i class="fas fa-plus"></i>
                                                        Tulis Komentar</a>
                                                </div>
                                            </td>
                                            <!-- LIMIT DARI 1-100 -->
                                            <td>
                                                <div class="nilai-ta">
                                                    <a href="dospenguji-tambah-nilai.html"
                                                        class="btn btn-primary"><i class="fas fa-plus"></i>
                                                        Tambah Nilai</a>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" name="save-data"
                                                    class="btn btn-primary">Save</button>
                                            </td>
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