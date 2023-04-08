<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3 ">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
            <li>
                <h1 class="header-nav">Dashboard</h1>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i
                    class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifikasi
                </div>
                <div class="dropdown-list-content dropdown-list-icons" tabindex="3"
                    style="outline: none; height: fit-content; max-height: 300px;">
                    <?php foreach ($notifikasi as $n) { ?>
                    <a href="{{ url($n->notifikasi_link) }}" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="{{ $n->notifikasi_icon }}"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            {{ $n->notifikasi_pesan }}
                            <div class="time">{{ date('d-M-Y h:i:s a', strtotime($n->notifikasi_waktu)) }}</div>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ URL::to('/profile') }}" class="dropdown-item">
                    <i class=""></i> Profile
                </a>
                <a href="{{ URL::to('/logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>

        </li>
    </ul>
</nav>
