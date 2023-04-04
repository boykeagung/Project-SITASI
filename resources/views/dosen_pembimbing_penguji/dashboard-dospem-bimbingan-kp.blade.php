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
                                <h4>Data Mahasiswa Bimbingan Sidang Proposal Tugas Akhir</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NRP</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Waktu Bimbingan</th>
                                            <th>Kegiatan Bimbingan</th>
                                            <th>Status</th>
                                            <th>Update At</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>NRP</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Waktu Bimbingan</th>
                                            <th>Kegiatan Bimbingan</th>
                                            <th>
                                                <select class="form-select" aria-label="Default select example" name="status">
                                                    <option value="Diproses">Proses</option>
                                                    <option value="Lulus">Disetujui</option>
                                                    <option value="Tidak Lulus">Tidak Disetujui</option>
                                                </select>
                                            </th>
                                            <th>Update At</th>
                                            {{-- <th><Button>Save</Button></th> --}}
                                        </tr>
                                    </tbody>
                                </table>
                                <Button>Save</Button>
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