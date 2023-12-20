@extends('template_back.layout')
@section('title', 'Edit Task Harian')
@section('content')

    <!-- /breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
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
                        <h4 class="card-title mg-b-0 mt-2">Edit TASK HARIAN</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelolamonitoring.update', ['id' => $monitoring->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="date" readonly value="{{ $monitoring->tanggal }}" name="tanggal"
                                class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" name="task_harian" value="{{ $monitoring->task_harian }}"
                                        class="form-control" placeholder="Task hari ini" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
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
