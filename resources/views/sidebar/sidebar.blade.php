<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <h4></h4>
            <a href="/"><img width="120" src="/assets/img/logo-v2.png"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/"><img src="/assets/img/logo.png" width="70"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Progress Tugas Akhir</li>
            <li class="{{ Request::is('dashboard-mahasiswa') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa'); ?>><i class="	fa fa-line-chart"></i></i>
                    <span>Progress Tugas Akhir</span></a></li>
            <li class="menu-header">Management Pendaftaran Tugas Akhir</li>
            <li class="{{ Request::is('dashboard-mahasiswa-residensi-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa-residensi-ta'); ?>><i class="fas fa-camera"></i>
                    <span>Residensi Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-mahasiswa-proposal-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa-proposal-ta'); ?>><i class="fas fa-sticky-note"></i>
                    <span>Proposal Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-mahasiswa-seminar-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa-seminar-ta'); ?>><i class="fas fa-book-open"></i>
                    <span>Seminar Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-mahasiswa-sidang-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa-sidang-ta'); ?>><i class="fas fa-book-reader"></i>
                    <span>Sidang Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-mahasiswa-bimbingan-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa-bimbingan-ta'); ?>><i class="fas fa-file-alt"></i>
                    <span>Bimbingan Tugas Akhir</span></a></li>
            <li class="menu-header">Management Pendaftaran Kerja Praktik</li>
            <li class="{{ Request::is('dashboard-mahasiswa-form-001') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa-form-001'); ?>><i class="fas fa-sticky-note"></i>
                    <span>Pengajuan Kerja
                        Praktik (Form-001)</span></a></li>
            <li class="{{ Request::is('dashboard-mahasiswa-kp') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa-kp'); ?>><i class="fas fa-sticky-note"></i>
                    <span>Daftar Kerja Praktik</span></a></li>
            <li class="{{ Request::is('dashboard-mahasiswa-bimbingan-kp') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa-bimbingan-kp'); ?>><i class="fas fa-book-open"></i>
                    <span>Bimbingan Kerja Praktik</span></a></li>
            <li class="{{ Request::is('dashboard-mahasiswa-sidang-kp') ? 'active' : '' }}"><a class="nav-link"
                href=<?php echo url('dashboard-mahasiswa-sidang-kp'); ?>><i class="fas fa-book-open"></i>
                <span>Sidang Kerja
                        Praktik</span></a></li>
            <li class="{{ Request::is('dashboard-mahasiswa-penilaian-kp') ? 'active' : '' }}"><a class="nav-link"
                href=<?php echo url('dashboard-mahasiswa-penilaian-kp'); ?>><i class="fas fa-book-open"></i>
                <span>Input Nilai Kerja
                        Praktik</span></a></li>
            <li class="menu-header">Yudisium</li>
            <li class="{{ Request::is('dashboard-mahasiswa-yudisium') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-mahasiswa-yudisium'); ?>><i class="fas fa-graduation-cap"></i>
                    <span>Daftar Yudisium</span></a></li>
            <li class="{{ Request::is('dashboard-mahasiswa-yudisium/tentang-yudisium') ? 'active' : '' }}"><a
                    class="nav-link" href=<?php echo url('dashboard-mahasiswa-yudisium/tentang-yudisium'); ?>><i
                        class="fas fa-graduation-cap"></i>
                    <span>Tata Cara Yudisium</span></a></li>
            <li class="menu-header">Informasi</li>
            <li class="{{ Request::is('profile-mahasiswa') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('profile-mahasiswa'); ?>><i class="fas fa-user-alt"></i>
                    <span>Profile</span></a></li>
            <!--<li class="menu-header">Pengguna</li>
<li><a class="nav-link" href="#"><i class="fas fa-users"></i> <span>Pengguna Admin</span></a></li>
<li><a class="nav-link" href="#"><i class="fas fa-users"></i> <span>Pengguna Mahasiswa</span></a></li>

<li class="menu-header">Management Tugas Akhir</li>
<li><a class="nav-link" href=""><i class="fas fa-file"></i> <span>Data Tugas Akhir</span></a></li>-->
        </ul>
    </aside>
</div>
