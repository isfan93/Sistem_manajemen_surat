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
                            <input type="search" name="search" class="form-control" placeholder="Cari">
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-secondary card-hover">Cari</button>
                        </div>
                </form>
                    <div class="col-2">
                        <a href="{{ route('tambah-surat-masuk') }}" class="btn btn-light card-hover px-4">Tambah Data +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sortir') }}" method="get">
                <div class="row pb-2">
                    <div class="col-2">
                        <input type="date" name="date1" class="form-control">
                    </div>
                    <div class="col-2">
                        <input type="date" name="date2" class="form-control">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary card-hover">Sort</button>
                    </div>
                </div>
            </form>
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
                                <a href="" class="btn btn-primary text-white card-hover">Print</a>
                                <a href="" class="btn btn-warning text-white card-hover">Edit</a>
                                <a href="" class="btn btn-success text-white card-hover">Disp</a>
                                <a href="" class="btn btn-danger text-white card-hover">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection