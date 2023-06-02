<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <h4> </h4>
            <a href="/" ; ?>><img width="120" src="/assets/img/logo-v2.png"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/"><img src="/assets/img/logo.png" width="70"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard-tata-usaha') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-tata-usaha'); ?>><i class="fas fa-th-large"></i>
                    <span>Daftar Mahasiswa</span></a></li>
            <li class="menu-header">Management Tugas Akhir</li>
            <li class="{{ Request::is('dashboard-tata-usaha-proposal-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-tata-usaha-proposal-ta'); ?>><i class="fas fa-sticky-note"></i>
                    <span>Proposal Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-tata-usaha-seminar-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-tata-usaha-seminar-ta'); ?>><i class="fas fa-book-open"></i>
                    <span>Seminar Tugas
                        Akhir</span></a></li>
            <li class="{{ Request::is('dashboard-tata-usaha-sidang-ta') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-tata-usaha-sidang-ta'); ?>><i class="fas fa-book-reader"></i>
                    <span>Sidang Tugas
                        Akhir</span></a></li>
            <li class="menu-header">Management Kerja Praktik</li>
            <li class="{{ Request::is('dashboard-tata-usaha-form-001') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-tata-usaha-form-001'); ?>><i class="fas fa-sticky-note"></i>
                    <span>Pengajuan Kerja
                        Praktik (Form-001)</span></a></li>
            <li class="{{ Request::is('dashboard-tata-usaha-sidang-kp') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-tata-usaha-sidang-kp'); ?>><i class="fas fa-book-open"></i>
                    <span>Sidang Kerja
                        Praktik</span></a></li>
            <li class="menu-header">Management Yudisium</li>
            <li class="{{ Request::is('dashboard-tata-usaha-yudisium') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-tata-usaha-yudisium'); ?>><i class="fas fa-graduation-cap"></i>
                    <span>Manajemen
                        Yudisium</span></a></li>
        </ul>
    </aside>
</div>
