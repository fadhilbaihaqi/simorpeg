<!-- main-sidebar opened -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="main-sidebar app-sidebar sidebar-scroll">
    <div class="main-sidebar-header">
        <a class="desktop-logo logo-light active" class="text-center mx-auto"><img
                src="{{ asset('') }}assets/img/brand/DMT.png" class="main-logo"></a>
        <a class="desktop-logo icon-logo active" href="index.html"><img
                src="{{ asset('') }}assets/img/brand/favicon.png" class="logo-icon"></a>
        <a class="desktop-logo logo-dark active" href="index.html"><img
                src="{{ asset('') }}assets/img/brand/logo-white.png" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img
                src="{{ asset('') }}assets/img/brand/favicon-white.png" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <!-- /logo -->
    <div class="main-sidebar-loggedin">
        <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
                <div class="user-pic">
                    <img src="{{ asset('') }}assets/img/faces/6.jpg" alt="user-img"
                        class="rounded-circle mCS_img_loaded">
                </div>
                <div class="user-info">
                    <h6 class=" mb-0 text-dark">{{ auth()->user()->pegawai->nama }}</h6>
                    <span class="text-muted app-sidebar__user-name text-sm">{{ auth()->user()->role->role }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /user -->

    <div class="main-sidebar-body">
        <ul class="side-menu ">
            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard') }}"><i
                        class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
            </li>
            @if (strtolower(auth()->user()->role->role) == strtolower('admin'))
                <li class="slide">
                    <a class="side-menu__item {{ request()->is('kelolapegawai*') ? 'active' : '' }}"
                        href="{{ route('kelolapegawai') }}"><i class="side-menu__icon fe fe-users"></i><span
                            class="side-menu__label">Kelola Pegawai</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->is('penilaianpegawai*') ? 'active' : '' }}"
                        href="{{ route('penilaianpegawai.index') }}"><i class="side-menu__icon fe fe-user"></i><span
                            class="side-menu__label">Penilaian
                            Pegawai</span></a>
                </li>
            @endif

            <li class="slide">
                <a class="side-menu__item {{ request()->is('kelolamonitoring*') ? 'active' : '' }}"
                    href="{{ route('kelolamonitoring.index') }}"><i class="side-menu__icon fe fe-file"></i><span
                        class="side-menu__label">Kelola Monitoring</span></a>
            </li>
            {{-- @if (strtolower(auth()->user()->role->role) == strtolower('admin'))
            @endif --}}


            <li class="slide">
                <a class="side-menu__item {{ request()->is('laporan*') ? 'active' : '' }}"
                    href="{{ route('laporan.index') }}"><i class="side-menu__icon fe fe-award"></i><span
                        class="side-menu__label">Laporan</span></a>
            </li>

        </ul>
    </div>
</aside>
<!-- /main-sidebar -->
