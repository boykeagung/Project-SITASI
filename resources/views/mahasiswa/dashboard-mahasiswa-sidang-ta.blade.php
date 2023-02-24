@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="card card-primary mb-0">
                <form action="#" method="POST">
                    <input type="hidden" name="user_id" value="" required>
                    <div class="card-header row">
                        <h3 class="section-title col-8">Daftar Sidang Tugas Akhir</h2>
                    </div>
                    <div class="card-body">
                        <div class="accordion-pendaftaran">
                            <div class="accordion-pendaftaran-item">
                                <div class="accordion-pendaftaran-header card-header p-0">
                                    <h4>Input Data Mahasiswa</h4>
                                </div>
                                <div class="accordion-pendaftaran-item-body">
                                    <div class="accordion-pendaftaran-item-content">
                                        <div class="data-mahasiswa">
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputID_Sidang_TA">ID Sidang Tugas Akhir</label>
                                                        <input type="text" class="form-control" id="inputID_Sidang_TA" 
                                                        placeholder="ID Sidang Tugas Akhir" value="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputID_TA">ID Tugas Akhir</label>
                                                        <input type="text" class="form-control" id="inputID_TA"
                                                        placeholder="ID Tugas Akhir" value="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJudul">Judul</label>
                                                        <input type="text" class="form-control" id="inputJudul"
                                                        placeholder="Judul" value="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputFile" class="form-label">Buku TA</label>
                                                        <br>
                                                        {!!
                                                        Form::File('Buku TA')!!}
                                                        <br>
                                                        <span class="text-red"> *File Upload yang diperbolehkan nya .PDF </span>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <button type="submit" class="btn btn-primary mb-5 mt-3">Tambah Data</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary mb-0">
                            <div class="card-header">
                                <h4>Kegiatan Tugas Akhir</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-responsive table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Tahap TA</th>
                                            <th class="col-md-3">Judul TA</th>
                                            <th class="col-md-2">Files</th>
                                            <th>Status Approval</th>
                                            <th>Jadwal Sidang</th>
                                            <th>Dosen Penguji 1</th>
                                            <th>Dosen Penguji 2</th>
                                            <th>Action</th>
                                            <th>Timestamp Penyimpanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width:5%">Sidang Tugas Akhir</td>
                                            <td>JUDUL TA</td>
                                            <td>
                                                <!--DIPAKAI KALO BELUM UPLOAD DRAFT, PERLU KONDISI-->
                                                <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i>
                                                    Upload Draft</a>
                                                <!--DIPAKAI KALO UDAH UPLOAD DRAFT, PERLU KONDISI-->
                                                <!---<a href="#" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i> Lihat Draf</a>-->
                                                <!--DIPAKAI KALO BELUM UPLOAD FILE PENGAJUAN SIDANG, PERLU KONDISI-->
                                                <a href="upload-form-pengajuan-sidang.html"
                                                    class="btn btn-primary mt-2"><i class="fas fa-plus"></i>
                                                    Upload Form Pengajuan Sidang</a>
                                                <!--DIPAKAI KALO UDAH UPLOAD FILE PENGAJUAN SIDANG, PERLU KONDISI-->
                                                <!---<a href="#" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i> Lihat Form Pengajuan Sidang</a>-->

                                            </td>
                                            <td>
                                                <!--BAGIAN INI SESUAIKAN DENGAN APPROVAL DARI KOORDINATOR TA-->
                                                <button class="btn btn-secondary" disabled>Belum Ada File</button>
                                                <!-- <button class="btn btn-warning" disabled>Menunggu</button> -->
                                                <!--<button class="btn btn-success" disabled>Approved</button>-->
                                                <!--<button class="btn btn-danger" disabled>Di Tolak</button>-->
                                            </td>
                                            <td>
                                                <!--GUNAKAN INI JIKA BELUM ADA DATA JADWAL-->
                                                Belum ada tanggal
                                                <!--GUNAKAN INI JIKA ADA DATA JADWAL-->
                                                <!--<p>JADWAL SIDANG</p>-->
                                            </td>
                                            <td>
                                                <!--GUNAKAN INI JIKA BELUM ADA DATA DOSEN PENGUJI 1-->
                                                Belum ada Dosen Penguji 1
                                                <!--GUNAKAN INI JIKA ADA DATA DOSEN PENGUJI 1-->
                                                <!--<p>DOSEN PENGUJI 1</p>-->
                                            </td>
                                            <td>
                                                <!--GUNAKAN INI JIKA BELUM ADA DATA DOSEN PENGUJI 2-->
                                                Belum ada Dosen Penguji 2
                                                <!--GUNAKAN INI JIKA ADA DATA DOSEN PENGUJI 2-->
                                                <!--<p>DOSEN PENGUJI 2</p>-->
                                            </td>
                                            <td>
                                                <button type="submit" name="save-data"
                                                    class="btn btn-primary">Save</button>
                                                <div class="invalid-feedback">
                                                    File Belum Lengkap!
                                                </div>
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
            <div class="row">
                <div class="col-12">
                    <div class="komentar-dosen card card-primary">
                        <div class="card-header">
                            <div class="komentar-title">
                                <h4>Komentar Dosen</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tanggal-komentar fw-bold fs-6 mb-4">
                                <h5>Tanggal : DD/MM/YYYY</h5>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Komentar Dosen Penguji : </h5>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat aut eius
                                        nostrum ut quaerat illum cupiditate repellendus perspiciatis quibusdam,
                                        voluptate commodi illo? Sit expedita odit molestiae commodi laborum fuga ad.
                                    </p>
                                </div>
                                <div class="col">
                                    <h5>Komentar Dosen Pembimbing : </h5>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat aut eius
                                        nostrum ut quaerat illum cupiditate repellendus perspiciatis quibusdam,
                                        voluptate commodi illo? Sit expedita odit molestiae commodi laborum fuga ad.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('footer')

    </div>
</div>
@endsection