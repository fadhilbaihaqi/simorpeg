@extends('template_back.layout')
@section('title', 'Kelola Monitoring')
@section('content')
    @include('sweetalert::alert')


    <!-- /breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Tabel</li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola Monitoring</li>
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
                        <h4 class="card-title mg-b-0 mt-2">Task Harian</h4>
                        <a href="{{ route('kelolamonitoring.create') }}" class="btn btn-success">Tambah Task Harian</a>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="example1">
                            <thead>
                                <tr>
                                    <th class="">No</th>
                                    <th class="">Tanggal</th>
                                    <th class="">Task Harian</th>
                                    <th class="">Nama Pegawai</th>
                                    <th class="">Status</th>
                                    <th class="">Tanggal Selesai</th>
                                    <th class="">Upload</th>
                                    <th class="">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($monitoring as $m)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y', strtotime($m->tanggal)) }}</td>
                                        <td>{{ $m->task_harian }}</td>
                                        <td>{{ $m->user->pegawai->nama }}</td>
                                        @if (strtolower(auth()->user()->role->role) == strtolower('Pegawai'))
                                            @if ($m->status == 0)
                                                <td><button type="button" class="btn btn-sm btn-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#uploadTask{{ $m->id }}">Upload
                                                        Task</button></td>
                                            @else
                                                <td><span class="badge bg-success">Selesai</span></td>
                                            @endif
                                        @else
                                            @if ($m->status == 0)
                                                <td><span class="badge bg-info">Progress</span></td>
                                            @else
                                                <td><span class="badge bg-success text-white">Selesai</span></td>
                                            @endif
                                        @endif
                                        @if ($m->tanggal_selesai != null)
                                            <td>{{ date('d-m-Y', strtotime($m->tanggal_selesai)) }}</td>
                                        @else
                                            <td><span class="text-muted text-center">Task Belum Selesai</span></td>
                                        @endif
                                        @if ($m->upload != null)
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#lihat{{ $m->id }}">Lihat</button>
                                            </td>
                                        @else
                                            <td><span class="text-muted text-center">Belum Upload</span></td>
                                        @endif
                                        <td>
                                            @if ($m->status == 0)
                                                <a href="{{ route('kelolamonitoring.edit', ['id' => $m->id]) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                |
                                                <a href="{{ route('kelolamonitoring.delete', ['id' => $m->id]) }}"><i
                                                        class="fas fa-trash-alt" style="color:red;"
                                                        onclick="return confirm('Ingin menghapus data ?')"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    {{-- uploadtask --}}
                                    <div class="modal fade" id="uploadTask{{ $m->id }}" tabindex="-1"
                                        aria-labelledby="uploadTask{{ $m->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="uploadTask{{ $m->id }}Label">
                                                        Upload Task</h1>
                                                </div>
                                                <form
                                                    action="{{ route('kelolamonitoring.validateTask', ['id' => $m->id]) }}"
                                                    enctype="multipart/form-data" method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="upload" class="col-form-label">Upload
                                                                Task:</label>
                                                            <input type="file" class="form-control" id="upload"
                                                                name="upload" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- uploadtask --}}

                                    {{-- lihat --}}
                                    <div class="modal fade" id="lihat{{ $m->id }}" tabindex="-1"
                                        aria-labelledby="lihat{{ $m->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="lihat{{ $m->id }}Label">
                                                        Task Finish</h1>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <img src="{{ asset('storage/' . $m->upload) }}"
                                                            class="img-fluid text-center">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- lihat --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection
