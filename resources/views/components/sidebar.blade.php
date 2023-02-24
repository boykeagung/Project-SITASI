<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand h-100 p-5">
            <a href="{{ URL::to('/') }}"><img class="w-100" src="/assets/img/logo-v2.png"></a>
        </div>
        <div class="sidebar-brand h-100 p-2 sidebar-brand-sm">
            <a href="{{ URL::to('/') }}"><img class="w-100" src="/assets/img/logo-v1.png"></a>
        </div>
        @yield('sidebar-menu')
    </aside>
</div>
