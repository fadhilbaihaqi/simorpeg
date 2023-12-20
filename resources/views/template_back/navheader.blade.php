<!-- main-header -->
<div class="main-header  side-header">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="app-sidebar__toggle mobile-toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
            </div>
            <div class="responsive-logo">
                <a href="index.html"><img src="{{ asset('') }}assets/img/brand/logo-white.png" class="logo-1"></a>
                <a href="index.html"><img src="{{ asset('') }}assets/img/brand/logo.png" class="logo-11"></a>
                <a href="index.html"><img src="{{ asset('') }}assets/img/brand/favicon-white.png"
                        class="logo-2"></a>
                <a href="index.html"><img src="{{ asset('') }}assets/img/brand/favicon.png" class="logo-12"></a>
            </div>

        </div>
        <div class="main-header-right">

            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><i class="fe fe-maximize"></i></span></a>
                </div>

                <div class="dropdown main-profile-menu nav nav-item nav-link">

                    <a class="profile-user d-flex" href=""><img src="{{ asset('') }}assets/img/faces/6.jpg"
                            alt="user-img" class="rounded-circle mCS_img_loaded"><span></span></a>

                    <div class="dropdown-menu">
                        <div class="main-header-profile header-img">
                            <div class="main-img-user"><img alt=""
                                    src="{{ asset('') }}assets/img/faces/6.jpg"></div>
                            <h6> {{ auth()->user()->pegawai->nama }} </h6>
                            <span>{{ auth()->user()->role->role }}</span>
                        </div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt"></i>
                                Logout</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
