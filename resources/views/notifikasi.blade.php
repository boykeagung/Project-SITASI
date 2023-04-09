@extends('layouts.layout-dashboard')

@section('page', 'SITASI')
@section('title', 'Pendaftaran Yudisium')

@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('navbar')

            @include('sidebar.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Notifikasi</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active">
                                @if (Auth::user()->level == 'koordinator-yudisium')
                                    <a href="{{ URL::to('/dashboard-koordinator-yudisium') }}">
                                        Dashboard
                                    </a>
                                @elseif(Auth::user()->level == 'user')
                                    <a href="{{ URL::to('/dashboard-mahasiswa') }}">
                                        Dashboard
                                    </a>
                                @elseif(Auth::user()->level == 'tu')
                                    <a href="{{ URL::to('/dashboard-tata-usaha') }}">
                                        Dashboard
                                    </a>
                                @endif
                            </div>
                            <div class="breadcrumb-item">
                                Notifikasi
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="list-group">
                        @foreach ($notifikasi as $n)
                            @if ($n->notifikasi_read != 1)
                                <a href="{{ url($n->notifikasi_link) }}"
                                    class="list-group-item list-group-item-action flex-column align-items-start dt-notification-button">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6>[{{ $n->notifikasi_context }}]</h6>
                                        <small>{{ date('j F Y, h:i a', strtotime($n->notifikasi_time)) }}</small>
                                    </div>
                                    <p class="mb-0">{{ $n->notifikasi_message }}</p>
                                </a>
                            @else
                                <a href="{{ url($n->notifikasi_link) }}"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6>[{{ $n->notifikasi_context }}]</h6>
                                        <small>{{ date('j F Y, h:i a', strtotime($n->notifikasi_time)) }}</small>
                                    </div>
                                    <p class="mb-0">{{ $n->notifikasi_message }}</p>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </section>
            </div>


            @include('footer')

        </div>
    </div>
@endsection

@push('specific-js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });
        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
@endpush
