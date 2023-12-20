@extends('template_back.layout')
@section('title', 'Dashboard')
@section('content')
    @include('sweetalert::alert')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h2 class="content-title mb-2">HALO, SELAMAT DATANG!</h2>
            <h4 class="content-title mb-2">SISTEM INFORMASI MONITORING PENILAIAN KINERJA PEGAWAI</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->


    <!-- main-content-body -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-order">
                        <h6 class="mb-2">Total Pegawai</h6>
                        <h2 class="text-right ">
                            <i class="mdi mdi-account icon-size float-left text-primary text-primary-shadow"></i>
                            <span>{{ $TotalPegawai }}</span>
                        </h2>
                        <p class="mb-0"><span class="float-right"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card ">
                <div class="card-body">
                    <div class="card-widget">
                        <h6 class="mb-2">Total Task Harian</h6>
                        <h2 class="text-right">
                            <i class="mdi mdi-file-plus icon-size float-left text-info text-success-shadow"></i>
                            <span>{{ $TotalTaskHarian }}</span>
                        </h2>
                        <p class="mb-0"><span class="float-right"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card ">
                <div class="card-body">
                    <div class="card-widget">
                        <h6 class="mb-2">Task Finish</h6>
                        <h2 class="text-right">
                            <i class="mdi mdi-file-check icon-size float-left text-success text-success-shadow"></i>
                            <span>{{ $TotalTaskFinish }}</span>
                        </h2>
                        <p class="mb-0"><span class="float-right"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card ">
                <div class="card-body">
                    <div class="card-widget">
                        <h6 class="mb-2">Task Progress</h6>
                        <h2 class="text-right">
                            <i class="mdi mdi-file-document icon-size float-left text-warning text-success-shadow"></i>
                            <span>{{ $TotalTaskProgress }}</span>
                        </h2>
                        <p class="mb-0"><span class="float-right"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection
