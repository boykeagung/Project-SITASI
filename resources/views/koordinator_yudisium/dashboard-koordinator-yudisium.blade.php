@extends('layout.layout-koordinator-kp')

@section('content')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('navbar')

            @include('sidebar.sidebar-koordinator-kp')

            <!-- Main Content -->
            <div class="main-content">
                <div class="col-12">
                    <div class="row">
                        Yudisium
                    </div>
                </div>

                @include('footer')

            </div>
        </div>
    </div>
@endsection
