@extends('layouts.main')
@section('content')
@section('breadcrumb', 'Surat Masuk')
@section('title', 'Surat Masuk')
    
<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card ">
            <div class="box bg-cyan">
                <form action="{{ route('surat-masuk') }}" method="get">
                <div class="row">
                        <div class="col-4">
                            <input type="text" name="search" class="form-control" placeholder="Cari">
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-secondary card-hover">Cari</button>
                        </div>
                </form>
                    <div class="col-2">
                        <a href="#" class="btn btn-light card-hover px-4" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
            {{-- <form action="{{ route('surat-masuk') }}" method="get">
                <div class="row pb-2">
                    <div class="col-2">
                        <input type="date" name="date1" class="form-control">
                    </div>
                    <div class="col-2">
                        <input type="date" name="date2" class="form-control">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary card-hover">Sort</button>
                    </div>
                </div>
            </form> --}}
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Surat</th>
                            <th>Isi Ringkas File</th>
                            <th>Asal Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Opsional</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat_m as $srt)
                        <tr>
                            <td>{{ $srt->id }}</td>
                            <td>{{ $srt->no_srt }}</td>
                            <td>{{ $srt->judul_srt }}</td>
                            <td>{{ $srt->asal_srt }}</td>
                            <td>{{ $srt->tgl_srt }}</td>
                            <td>
                                <a href="{{ route('view-doc') }}" class="btn btn-primary text-white card-hover">Download</a>
                                <a href="" class="btn btn-warning text-white card-hover">Edit</a>
                                <a href="" class="btn btn-success text-white card-hover">Disp</a>
                                <a href="" class="btn btn-danger text-white card-hover">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('view-doc') }}">View</a>
            </div>

        </div>
    </div>
</div>

{{-- add modal --}}
<div class="modal fade" id="tambahData" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Surat Masuk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="#" method="post">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Judul Surat</label>
                <input type="text" class="form-control" id="recipient-name" name="judul_srt">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Asal Surat</label>
                <input type="text" class="form-control" id="recipient-name" name="asal_srt">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">No Surat</label>
                <input type="text" class="form-control" id="recipient-name" name="no_srt">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Tanggal Surat</label>
                <input type="date" class="form-control" id="recipient-name" name="tgl_srt">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Masukan File Surat</label>
                <input type="file" class="form-control" id="recipient-name" name="file">
            </div>
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>
@endsection