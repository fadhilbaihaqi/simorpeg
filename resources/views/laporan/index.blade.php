@extends('template_back.layout')
@section('title', 'Laporan Penilaian Pegawai')
@section('content')


    <!-- /breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Laporan</li>
                    <li class="breadcrumb-item active" aria-current="page">Penilaian Pegawai</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- row opened -->
    <div class="row">
        @foreach ($user as $u)
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h2>{{ $u->pegawai->nama }}</h2>
                                <span>Role : {{ $u->role->role }}</span> <br>
                                <span>Alamat : {{ $u->pegawai->alamat }}</span> <br>
                                <span>Tanggal Lahir : <br>{{ date('d-m-Y', strtotime($u->pegawai->tgl_lahir)) }}</span>
                            </div>
                            <div class="col-6">
                                <h2 class="text-right text-muted fs-20"><i class="fe fe-user"></i></h2>
                            </div>
                        </div>
                        <a href="{{ route('laporan.show', ['id' => $u->id]) }}"
                            class="btn btn-primary btn-sm float-right">Detail ></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /row -->

@endsection
