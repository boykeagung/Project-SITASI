<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <h4> </h4>
            <a href="/"><img width="120" src="/assets/img/logo-v2.png"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/"><img src="/assets/img/logo.png" width="70"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Fitur tambah data user </li>
            <li class="{{ Request::is('dashboard-koordinator-ta') ? 'active' : '' }}"><a class="nav-link" href=<?php echo url('dashboard-koordinator-ta') ?>><i class="fas fa-th-large"></i>
                    <span>Daftar Mahasiswa</span></a></li>
            <li class="{{ Request::is('dashboard-koordinator-ta-dosen') ? 'active' : '' }}"><a class="nav-link" href=<?php echo url('dashboard-koordinator-ta-dosen') ?>><i
                        class="fas fa-th-large"></i>
                    <span>Daftar Dosen</span></a></li>
            <li class="menu-header">Management Pendaftaran Tugas Akhir</li>
            <li class="{{ Request::is('dashboard-koordinator-proposal-ta') ? 'active' : '' }}"><a class="nav-link" href=<?php echo url('dashboard-koordinator-proposal-ta') ?>><i
                        class="fas fa-sticky-note"></i> <span>Proposal Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-koordinator-seminar-ta') ? 'active' : '' }}"><a class="nav-link" href=<?php echo url('dashboard-koordinator-seminar-ta') ?>><i
                        class="fas fa-book-open"></i> <span>Seminar Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-koordinator-sidang-ta') ? 'active' : '' }}"><a class="nav-link" href=<?php echo url('dashboard-koordinator-sidang-ta') ?>><i
                        class="fas fa-book-reader"></i> <span>Sidang Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-koordinator-bimbingan-ta') ? 'active' : '' }}"><a class="nav-link" href=<?php echo url('dashboard-koordinator-bimbingan-ta') ?>><i
                        class="fas fa-book-reader"></i> <span>Bimbingan Tugas Akhir</span></a></li>
            {{-- <li><a class="nav-link" href="#"><i class="fas fa-sticky-note"></i> <span>Yudisium</span></a>
            <li class="menu-header">Management Pendaftaran Kerja Praktik</li>
            <li><a class="nav-link" href=<?php echo url('dashboard-koordinator-kp') ?>><i
                        class="fas fa-sticky-note"></i> <span>Daftar Kerja Praktik</span></a></li>
            <li><a class="nav-link" href=<?php echo url('dashboard-koordinator-sidang-kp') ?>><i
                        class="fas fa-book-open"></i> <span>Sidang Kerja Praktik</span></a></li>
            </li> --}}
            <li class="menu-header">Informasi</li>
            <li class="{{ Request::is('profile-tu') ? 'active' : '' }}"><a class="nav-link"
                href=<?php echo url('profile-tu'); ?>><i class="fas fa-user-alt"></i>
                <span>Profile</span></a></li>
        </ul>
    </aside>
</div>
