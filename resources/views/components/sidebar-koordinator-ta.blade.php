@extends('components.sidebar')
@section('sidebar-menu')
    <ul class="sidebar-menu">
        <li>
            <a class="nav-link" href="<?= url('dashboard-koordinator-ta') ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-header">Manajemen Manusia</li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-koordinator-ta-dosen') ?>">
                <i class="fas fa-users"></i>
                <span>Dosen</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-koordinator-ta') ?>">
                <i class="fas fa-users"></i>
                <span>Mahasiswa</span>
            </a>
        </li>
        <li class="menu-header">Manajemen Pendaftaran Sidang</li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-koordinator-proposal-ta') ?>">
                <i class="fas fa-book"></i>
                <span>Proposal Tugas Akhir</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-koordinator-seminar-ta') ?>">
                <i class="fas fa-book"></i>
                <span>Seminar Tugas Akhir</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-koordinator-sidang-ta') ?>">
                <i class="fas fa-book"></i>
                <span>Sidang Tugas Akhir</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="#">
                <i class="fas fa-user-graduate"></i>
                <span>Yudisium</span>
            </a>
        <li class="menu-header">Manajemen Pendaftaran KP</li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-koordinator-kp') ?>">
                <i class="fas fa-briefcase"></i>
                <span>Daftar Kerja Praktik</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= url('dashboard-koordinator-sidang-kp') ?>">
                <i class="fas fa-briefcase"></i>
                <span>Sidang Kerja Praktik</span>
            </a>
        </li>
        </li>
    </ul>
@endsection
