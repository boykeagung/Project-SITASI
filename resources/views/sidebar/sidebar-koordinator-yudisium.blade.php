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
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard-koordinator-yudisium') ? 'active' : '' }}">
                <a class="nav-link" href=<?= url('dashboard-koordinator-yudisium') ?>>
                    <i class="fas fa-graduation-cap"></i>
                    <span>Yudisium</span>
                </a>
            </li>
            <li class="menu-header">Informasi</li>
            <li class="{{ Request::is('profile-tu') ? 'active' : '' }}"><a class="nav-link"
                href=<?php echo url('profile-tu'); ?>><i class="fas fa-user-alt"></i>
                <span>Profile</span></a></li>
        </ul>
    </aside>
</div>
