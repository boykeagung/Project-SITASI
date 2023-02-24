@extends('components.sidebar')
@section('sidebar-menu')
    <ul class="sidebar-menu">
        <li>
            <a class="nav-link" href="<?= url('dashboard-tata-usaha') ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-header">Manajemen</li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-tata-usaha-tambah-data-mahasiswa') ?>">
                <i class="fas fa-users"></i>
                <span>Mahasiswa</span>
            </a>
        </li>
        <li class="menu-header">Manajemen TA</li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-tata-usaha-proposal-ta') ?>">
                <i class="fas fa-book"></i>
                <span>Proposal Tugas Akhir</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-tata-usaha-seminar-ta') ?>">
                <i class="fas fa-book"></i>
                <span>Seminar Tugas Akhir</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-tata-usaha-sidang-ta') ?>">
                <i class="fas fa-book"></i>
                <span>Sidang Tugas Akhir</span>
            </a>
        </li>
        <li class="menu-header">Manajemen KP</li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-tata-usaha-sidang-kp') ?>">
                <i class="fas fa-briefcase"></i>
                <span>Sidang Kerja Praktik</span>
            </a>
        </li>
        <li class="menu-header">Manajemen Yudisium</li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-tata-usaha-yudisium') ?>">
                <i class="fas fa-user-graduate"></i>
                <span>Yudisium</span>
            </a>
        </li>
    </ul>
    <div class="p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-question"></i> Panduan
        </a>
    </div>
@endsection
