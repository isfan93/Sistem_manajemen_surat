@extends('layouts.main')
@section('content')
@section('breadcrumb', 'Dashboard')
@section('title', 'Dashboard')

@php
    use App\Models\SuratMasuk;
    use App\Models\SuratKeluar;
    use App\Models\User;
    $count = SuratMasuk::all()->count();
    $count2 = SuratKeluar::all()->count();
    $count3 = User::all()->count();
    $trash = SuratMasuk::onlyTrashed()->count();
@endphp

<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card card-hover">
            <div class="box bg-dark text-center">
                <h1 class="font-light text-white"></h1>
                <h2 class="text-white">Selamat Datang {{ Auth::user()->name }} </h2>
                <h4 class="text-white">Anda Login sebagai {{ Auth::user()->role }}</h4>
            </div>
        </div>
    </div>
    {{-- <h1>Selamat Datang {{ Auth::user()->name }}</h1> --}}
    <div class="col-lg-4">
        <div class="card card-hover">
            <a href="{{ route('surat-masuk') }}"><div class="box bg-cyan text-center">
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-white"><i class="ri-mail-line"></i></h3>
                        <h4 class="text-white">Surat Masuk</h4>
                    </div>
                    <div class="col-6">
                        <h1 class="font-light text-white mt-2">{{ $count }}</h1>
                    </div>
                </div>
            </div></a>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-hover">
            <a href="{{ route('surat-keluar') }}"><div class="box bg-success text-center">
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-white"><i class="ri-mail-send-line"></i></h3>
                        <h6 class="text-white">Surat Keluar</h6>
                    </div>
                    <div class="col-6">
                        <h1 class="font-light text-white mt-2">{{ $count2 }}</h1>
                    </div>
                </div>
            </div></a>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-hover">
            <a href="#"><div class="box bg-secondary text-center">
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-white"><i class="ri-delete-bin-5-line"></i></h3>
                        <h6 class="text-white">Tempat Sampah</h6>
                    </div>
                    <div class="col-6">
                        <h1 class="font-light text-white mt-2">{{ $trash }}</i></h1>
                    </div>
                </div>
            </div></a>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-hover">
            <a href="#"><div class="box bg-warning text-center">
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-white"><i class="ri-user-3-fill"></i></h3>
                        <h6 class="text-white">User</h6>
                    </div>
                    <div class="col-6">
                        <h1 class="font-light text-white mt-2">{{ $count3 }}</i></h1>
                    </div>
                </div>
            </div></a>
        </div>
    </div>
</div>

@endsection