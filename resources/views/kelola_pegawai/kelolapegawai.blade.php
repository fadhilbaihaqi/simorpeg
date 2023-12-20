@extends('template_back.layout')
@section('title', 'Kelola Pegawai')
@section('content')
    @include('sweetalert::alert')

    <!-- /breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Tabel</li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola Pegawai</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->


    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 mt-2">KELOLA PEGAWAI</h4>
                        <a href="{{ route('kelolapegawai.tambah_data') }}" class="btn btn-success">Tambah Data</a>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                    <div class="row align-items-center mt-2">
                        <div class="col-auto">
                            <form action="{{ route('kelolapegawai') }}" method="GET">
                                <input type="search" class="form-control" name="search" placeholder="Cari">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-1p border-bottom-0">Id</th>
                                    <th class="wd-15p border-bottom-0">Nama</th>
                                    <th class="wd-15p border-bottom-0">Alamat</th>
                                    <th class="wd-15p border-bottom-0">Jenis Kelamin</th>
                                    <th class="wd-15p border-bottom-0">Tanggal Lahir</th>
                                    <th class="wd-15p border-bottom-0">username</th>
                                    <th class="wd-15p border-bottom-0">Role</th>
                                    <th class="wd-15p border-bottom-0">Aksi</th>
                                </tr>
                            </thead>

                            @php
                                $no = 1;
                            @endphp

                            <tbody>
                                @foreach ($KelolaPegawai as $kp => $index)
                                    <tr>
                                        <th class="wd-1p border-bottom-0">{{ $kp + $KelolaPegawai->firstItem() }}</th>
                                        <th class="wd-15p border-bottom-0">{{ $index->nama }}</th>
                                        <th class="wd-15p border-bottom-0">{{ $index->alamat }}</th>
                                        <th class="wd-15p border-bottom-0">{{ $index->jenis_kelamin }}</th>
                                        <th class="wd-15p border-bottom-0">
                                            {{ date('m-d-Y', strtotime($index->tgl_lahir)) }}</th>
                                        <th class="wd-15p border-bottom-0">{{ $index->user->username }}</th>
                                        <th class="wd-15p border-bottom-0">{{ $index->user->role->role }}</th>
                                        <th class="wd-15p border-bottom-0">
                                            <a href="{{ route('kelolapegawai.edit_data', ['id' => $index->id]) }}"><i
                                                    class="fas fa-edit"></i></a>
                                            |
                                            <a href="{{ route('kelolapegawai.delete_data', ['id' => $index->id]) }}"><i
                                                    class="fas fa-trash-alt" style="color:red;"
                                                    onclick="return confirm('Ingin menghapus data ?')"></i></a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-header float-left">
                            showing
                            {{ $KelolaPegawai->firstItem() }}
                            of
                            {{ $KelolaPegawai->lastItem() }}
                            to
                            {{ $KelolaPegawai->total() }}
                            entries
                        </div>
                        <div class="pagination float-right">
                            {{ $KelolaPegawai->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection
