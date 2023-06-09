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
            <li class="menu-header">Management Kerja Praktik</li>
            <li class="{{ Request::is('dashboard-koordinator-kp') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-koordinator-kp'); ?>><i class="fas fa-sticky-note"></i> <span>Daftar
                        Kerja
                        Praktik</span></a></li>
            <li class="{{ Request::is('dashboard-koordinator-sidang-kp') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-koordinator-sidang-kp'); ?>><i class="fas fa-book-open"></i>
                    <span>Sidang Kerja
                        Praktik</span></a></li>
            </li>
            <li class="{{ Request::is('dashboard-koordinator-bimbingan-kp') ? 'active' : '' }}"><a class="nav-link"
                    href=<?php echo url('dashboard-koordinator-bimbingan-kp'); ?>><i class="fas fa-book-open"></i>
                    <span>Bimbingan Kerja Praktik</span></a></li>
            </li>
            
            <li class="{{ Request::is('dashboard-koordinator-penilaian-kp') ? 'active' : '' }}"><a class="nav-link"
                href=<?php echo url('dashboard-koordinator-penilaian-kp'); ?>><i class="fas fa-book-open"></i>
                <span>Nilai Kerja Praktik</span></a></li>
        </li>
            <li class="menu-header">Informasi</li>
            <li class="{{ Request::is('profile-tu') ? 'active' : '' }}"><a class="nav-link"
                href=<?php echo url('profile-tu'); ?>><i class="fas fa-user-alt"></i>
                <span>Profile</span></a></li>
        </ul>
    </aside>
</div>
