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
            <li class="menu-header">Menu Dosen Pembimbing Tugas Akhir</li>
            <li class="{{ Request::is('dashboard-dospem-proposal-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-dospem-proposal-ta') ?>><i class="fas fa-sticky-note"></i>
                    <span>Proposal Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-dospem-seminar-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-dospem-seminar-ta'); ?>><i class="fas fa-book-open"></i>
                    <span>Seminar Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-dospem-sidang-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-dospem-sidang-ta'); ?>><i class="fas fa-book-reader"></i>
                    <span>Sidang Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-dospem-bimbingan-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-dospem-bimbingan-ta') ?>><i class="fas fa-sticky-note"></i>
                    <span>Bimbingan Tugas Akhir</span></a></li>
            <li><a class="nav-link" href=<?php echo url('dashboard-dospem-residensi-ta'); ?>>
                    <i class="fa-solid fa-bars"></i> <span>Residensi Tugas Akhir</span></a></li>
            <li class="menu-header">Menu Dosen Pembimbinga Kerja Praktik</li>
            <li class="{{ Request::is('dashboard-dospem-sidang-kp') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-dospem-sidang-kp'); ?>><i class="fas fa-sticky-note"></i>
                    <span>Sidang Kerja
                        Praktik</span></a></li>
            <li class="{{ Request::is('dashboard-dospem-bimbingan-kp') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-dospem-bimbingan-kp') ?>><i class="fas fa-book-open"></i>
                    <span>Bimbingan Kerja Praktik</span></a></li>
            <li class="menu-header">Menu Dosen Penguji Tugas Akhir</li>
            <li class="{{ Request::is('dashboard-dospenguji-proposal-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-dospenguji-proposal-ta'); ?>><i class="fas fa-sticky-note"></i>
                    <span>Proposal Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-dospenguji-seminar-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-dospenguji-seminar-ta'); ?>><i class="fas fa-book-open"></i>
                    <span>Seminar Tugas
                        Akhir</span></a></li>
            <li><a class="nav-link" href=<?php echo url('dashboard-dospenguji-residensi-ta'); ?>>
                    <i class="fa-solid fa-bars"></i> <span>Residensi Tugas Akhir</span></a></li>
            <li class="menu-header ">Menu Dosen Penguji Kerja Praktik</li>
            <li class="{{ Request::is('dashboard-dospenguji-sidang-kp') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-dospenguji-sidang-kp') ?>><i class="fas fa-sticky-note"></i>
                    <span>Sidang Kerja Praktik</span></a></li>
            <li class="menu-header">Informasi</li>
            <li class="{{ Request::is('profile-tu') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('profile-tu'); ?>><i class="fas fa-user-alt"></i>
                    <span>Profile</span></a></li>
        </ul>
    </aside>
</div>
