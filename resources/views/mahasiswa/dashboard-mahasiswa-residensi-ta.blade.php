@extends('layout.layout-mahasiswa')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('navbar')

        @include('sidebar.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Residensi Mahasiswa Tingkat Akhir</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <select class="form-control m-bot15" name="role_id">
                                    <option class="text-center">Buka Kamera</option>
                                </select>
                            </div>
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