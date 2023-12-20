@extends('template_auth.layout')
@section('title', 'Silahkan Login')
@section('content')
    @include('sweetalert::alert')


    <!-- page -->
    <div class="page">

        @if (session()->has('loginSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('loginSuccess') }}
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- main-signin-wrapper -->
        <div class="my-auto page page-h">
            <div class="main-signin-wrapper">
                <div class="main-card-signin d-md-flex wd-100p">
                    <div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white">
                        <div class="my-auto authentication-pages">
                            <div>
                                <img src="{{ asset('') }}assets/img/brand/logo-white.png" class=" m-0 mb-4"
                                    alt="logo">
                                <h5 class="mb-4">Responsive Modern Dashboard &amp; Admin Template</h5>
                                {{-- <p class="mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <a href="index.html" class="btn btn-success">Learn More</a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- main-signin-wrapper -->

                    <div class="p-5 wd-md-50p">
                        <div class="main-signin-header">
                            @if (session('loginError'))
                                <div class="alert alert-solid-danger" role="alert">
                                    <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                        <span aria-hidden="true">&times;</span></button>
                                    <strong>{{ session('loginError') }}</strong>
                                </div>
                            @endif
                            <img src="{{ asset('') }}assets/img/brand/DMT.png" class=" m-0 mb-4" alt="logo">
                            <h2>Selamat Datang Di SIMORPEG!</h2>
                            <h4>Silahkan login untuk melanjutkan</h4>
                            <form action="{{ route('auth') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input class="form-control rounded @error('username') is-invalid @enderror"
                                        id="username" placeholder="Masukkan username anda" type="username" name="username"
                                        autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input class="form-control rounded" id="password" placeholder="Masukkan password anda"
                                        type="password" name="password" required>
                                </div>
                                <button class="btn btn-main-primary btn-block" type="submit">Login <i
                                        class="fas fa-sign-in-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page closed -->
@endsection
