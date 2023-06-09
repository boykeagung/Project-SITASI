@extends('components.sidebar')
@section('sidebar-menu')
    <ul class="sidebar-menu">
        <li class="menu-header">
            Daftar
            Mahasiswa
            Bimbingan
        </li>
        <li><a class="nav-link" href=<?= url('dashboard-dospem-proposal-ta') ?>><i class="fas fa-sticky-note"></i>
                <span>Proposal
                    Tugas
                    Akhir</span></a>
        </li>
        <li><a class="nav-link" href=<?= url('dashboard-dospem-seminar-ta') ?>><i class="fas fa-book-open"></i>
                <span>Seminar
                    Tugas
                    Akhir</span></a>
        </li>
        <li><a class="nav-link" href=<?= url('dashboard-dospem-sidang-ta') ?>><i class="fas fa-book-reader"></i>
                <span>Sidang
                    Tugas
                    Akhir</span></a>
        </li>
        <li><a class="nav-link" href=<?= url('dashboard-dospem-sidang-kp') ?>><i class="fas fa-sticky-note"></i>
                <span>Sidang
                    Kerja
                    Praktik</span></a>
        </li>
        <li class="menu-header">
            Daftar
            Mahasiswa
            Yang Diuji
        </li>
        <li><a class="nav-link" href=<?= url('dashboard-dospenguji-proposal-ta') ?>><i class="fas fa-sticky-note"></i>
                <span>Proposal
                    Tugas
                    Akhir</span></a>
        </li>
        <li><a class="nav-link" href=<?= url('dashboard-dospenguji-seminar-ta') ?>><i class="fas fa-book-open"></i>
                <span>Seminar
                    Tugas
                    Akhir</span></a>
        </li>
        <li><a class="nav-link" href=<?= url('dashboard-dospenguji-sidang-ta') ?>><i class="fas fa-book-reader"></i>
                <span>Sidang
                    Tugas
                    Akhir</span></a>
        </li>
        <li><a class="nav-link" href=<?= url('dashboard-dospenguji-sidang-kp') ?>><i class="fas fa-sticky-note"></i>
                <span>Sidang
                    Kerja
                    Praktik</span></a>
        </li>
    @endsection
