@extends('template_back.layout')
@section('title', 'Edit Data Pegawai')
@section('content')

    <!-- /breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->
    @if ($errors->any())
        <div class="alert alert-solid-danger" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span></button>
            <strong>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </strong>
        </div>
    @endif

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 mt-2">EDIT DATA PEGAWAI</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelolapegawai.update_data', $peg->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai"
                                value="{{ $peg->nama }}">
                        </div>

                        <div class="form-group">
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Pegawai">{{ $peg->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required="true">

                                <option>{{ $peg->jenis_kelamin }}</option>

                                <option value="L">Laki-Laki</option>

                                <option value="P">Perempuan</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <input type="date" name="tgl_lahir" class="form-control" value="{{ $peg->tgl_lahir }}">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control"
                                        value="{{ $peg->user->username }}" placeholder="Username">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="role_id" id="role_id" class="form-control" required="true">
                                <option>--Pilih Role--</option>
                                @foreach ($roles as $r)
                                    <option value="{{ $r->id }}"
                                        {{ $r->id == $peg->user->role_id ? 'selected' : '' }}>{{ $r->role }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('kelolapegawai') }}" class="btn btn-primary">Kembali</a>
                            <button type="submit" class="btn btn-success float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /row -->
@endsection
