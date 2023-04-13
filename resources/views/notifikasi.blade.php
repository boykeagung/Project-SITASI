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
                            <a href="{{ url('/clearNotifications') }}">Mark All As Read</a>
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
                                    class="list-group-item list-group-item-action flex-column align-items-center mb-1">
                                    <div class="d-flex w-100 justify-content-between">
                                        <div>
                                            <small
                                                class="text-muted mr-2">{{ date('j F Y, h:i a', strtotime($n->notifikasi_time)) }}</small>
                                            <p class="mb-0">{{ $n->notifikasi_message }}</p>
                                        </div>
                                        <div>
                                            <span class="badge badge-{{ $n->notifikasi_color }}">
                                                {{ $n->notifikasi_context }}
                                            </span>
                                        </div>
                                    </div>
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
