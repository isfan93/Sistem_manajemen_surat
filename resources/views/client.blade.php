@extends('layouts.main')
@section('content')
@section('breadcrumb', 'Dashboard')
@section('title', 'Dashboard')
    
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
                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                <h6 class="text-white">Surat Masuk</h6>
            </div></a>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-hover">
            <a href="{{ route('surat-keluar') }}"><div class="box bg-success text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                <h6 class="text-white">Surat Keluar</h6>
            </div></a>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-hover">
            <a href="#"><div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                <h6 class="text-white">User</h6>
            </div></a>
        </div>
    </div>
</div>

@endsection