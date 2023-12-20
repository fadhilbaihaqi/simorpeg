@extends('template_back.layout')
@section('title', 'Input Penilaian Pegawai')
@section('content')


    <!-- /breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Show Pegawai</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $user->pegawai->nama }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- row opened -->
    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>{{ $user->pegawai->nama }}</h2>
                            <span>Role : {{ $user->role->role }}</span> <br>
                            <span>Alamat : {{ $user->pegawai->alamat }}</span> <br>
                            <span>Tanggal Lahir : <br>{{ date('d-m-Y', strtotime($user->pegawai->tgl_lahir)) }}</span>
                        </div>
                        <div class="col-6">
                            Grade : <br>
                            @if ($penilaian)
                                @if ($penilaian->grade == 'A')
                                    <h1 class="text-success">{{ $penilaian->grade }}</h1>
                                @elseif($penilaian->grade == 'B')
                                    <h1 class="text-primary">{{ $penilaian->grade }}</h1>
                                @elseif($penilaian->grade == 'C')
                                    <h1 class="text-warning">{{ $penilaian->grade }}</h1>
                                @elseif($penilaian->grade == 'D')
                                    <h1 class="text-danger">{{ $penilaian->grade }}</h1>
                                @else
                                    <h1 class="text-muted">{{ $penilaian->grade }}</h1>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0 mt-2">Input Penilaian</h4>
                                <div class="row">
                                    @php
                                        $sBulan = $_GET ? $_GET['bulan'] : '';
                                        $sTahun = $_GET ? $_GET['tahun'] : '';
                                        $url = $penilaian ? 'update' : 'store';
                                    @endphp
                                    <div class="col">
                                        <select name="bulan" id="bulan" class="form-control" onchange="search()">
                                            @foreach ($bulan as $b => $val)
                                                @if ($_GET)
                                                    <option value="{{ $b }}"
                                                        {{ $b == $sBulan ? 'selected' : '' }}>
                                                        {{ $val }}</option>
                                                @else
                                                    <option value="{{ $b }}"
                                                        {{ $b == date('m') ? 'selected' : '' }}>
                                                        {{ $val }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="tahun" id="tahun" class="form-control" onchange="search()">
                                            @for ($i = date('Y'); $i >= 2020; $i--)
                                                <option value="{{ $i }}" {{ $sTahun == $i ? 'selected' : '' }}>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('penilaianpegawai.' . $url, ['id' => $user->id]) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <h6>A. Keterampilan</h6>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Keterampilan</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Kecepatan Menyelesaikan Error</td>
                                                <td>
                                                    @if ($penilaian)
                                                        <input type="hidden" name="bulan_penilaian"
                                                            value="{{ $penilaian->bulan_penilaian }}">
                                                    @else
                                                        <input type="hidden" name="bulan_penilaian"
                                                            value="{{ $sBulan && $sTahun ? $sTahun . '-' . $sBulan : date('Y-m') }}">
                                                    @endif
                                                    <input type="number" min="0" max="100"
                                                        value="{{ $penilaian ? $penilaian->problem_solving : '' }}"
                                                        name="problem_solving" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Membuat program kode yang mudah diperbaiki (Clean Code)</td>
                                                <td><input type="number" min="0" max="100" name="clean_code"
                                                        value="{{ $penilaian ? $penilaian->clean_code : '' }}"
                                                        class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Merancang Database</td>
                                                <td><input type="number" min="0" max="100" name="database"
                                                        value="{{ $penilaian ? $penilaian->database : '' }}"
                                                        class="form-control">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h6>A. Kepribadian</h6>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kepribadian</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Bertanggung jawab pada Project yang diberikan</td>
                                                    <td><input type="number" min="0" max="100"
                                                            name="responsibility"
                                                            value="{{ $penilaian ? $penilaian->responsibility : '' }}"
                                                            class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Memimpin team dalam sebuah project</td>
                                                    <td><input type="number" min="0" max="100"
                                                            value="{{ $penilaian ? $penilaian->leadership : '' }}"
                                                            name="leadership" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Pengambilan keputusan dalam konflik project</td>
                                                    <td><input type="number" min="0" max="100" name="decition"
                                                            value="{{ $penilaian ? $penilaian->decition : '' }}"
                                                            class="form-control"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 mt-2">Task Harian</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Task Harian</th>
                                    <th>Status</th>
                                    <th>Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->monitoring as $u)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y', strtotime($u->tanggal)) }}</td>
                                        <td>{{ $u->task_harian }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $u->status > 0 ? 'success text-white' : 'info' }}">{{ $u->status > 0 ? 'Selesai' : 'Progress' }}</span>
                                        </td>
                                        @if ($u->upload != null)
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#lihat{{ $u->id }}">Lihat</button>
                                            </td>
                                        @else
                                            <td><span class="text-muted text-center">Belum Upload</span></td>
                                        @endif
                                    </tr>
                                    <div class="modal fade" id="lihat{{ $u->id }}" tabindex="-1"
                                        aria-labelledby="lihat{{ $u->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="lihat{{ $u->id }}Label">
                                                        Task Finish</h1>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <img src="{{ asset('storage/' . $u->upload) }}"
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

    <script>
        function search(params) {
            let bulan = document.getElementById('bulan').value;
            let tahun = document.getElementById('tahun').value;
            window.location.href = "?bulan=" + bulan + "&tahun=" + tahun;
        }
    </script>

@endsection
