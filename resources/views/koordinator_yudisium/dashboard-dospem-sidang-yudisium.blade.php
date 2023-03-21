@extends('layouts.layout-dashboard')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('components.navbar')

            @include('components.sidebar-dospem-dospenguji-ta')

            <!-- Main Content -->
            <div class="main-content">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Mahasiswa Bimbingan Sidang Yudisium</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th style="width:5%">No.</th>
                                                <th>NRP</th>
                                                <th>Nama Lengkap</th>
                                                <th>Judul TA</th>
                                                <th>Files</th>
                                                <th width="160px">Status Approval</th>
                                                <th>Jadwal Sidang</th>
                                                <th>Dosen Penguji 1</th>
                                                <th>Dosen Penguji 2</th>
                                                <th>Nilai</th>
                                                <th class="col-md-3">Komentar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>162018006</td>
                                                <td>Alam Verdiansyah</td>
                                                <td>Pembuatan Website Manajemen Perpustakaan</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary mb-2" target="_blank"><i
                                                            class="fas fa-eye"></i> Lihat Draft</a>
                                                    <a href="#" class="btn btn-primary mb-2" target="_blank"><i
                                                            class="fas fa-eye"></i> Lihat Berita Acara</a>
                                                    <a href="upload-bap-nilai.html" class="btn btn-primary"><i
                                                            class="fas fa-plus"></i>
                                                        Upload BAP Dengan Nilai</a>
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
                                                <td>Dosen Penguji 1</td>
                                                <td>Dosen Penguji 2</td>
                                                <td>
                                                    <div class="nilai-ta">
                                                        <a href="dospem-tambah-nilai.html" class="btn btn-primary"><i
                                                                class="fas fa-plus"></i>
                                                            Tambah Nilai</a>
                                                        <a href="#" class="btn btn-primary mt-2"><i
                                                                class="fas fa-eye"></i>
                                                            Lihat Nilai</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="komentar-ta">
                                                        <a href="dospem-tulis-komentar.html" class="btn btn-primary"><i
                                                                class="fas fa-plus"></i>
                                                            Tulis Komentar</a>
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
