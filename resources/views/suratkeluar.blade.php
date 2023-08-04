@extends('layouts.main')
@section('content')
@section('breadcrumb', 'Surat Keluar')
@section('title', 'Surat Keluar')
    
<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"></h1>
                <h2 class="text-white">Selamat Datang {{ Auth::user()->name }} </h2>
                <h4 class="text-white">Anda Login sebagai {{ Auth::user()->role }}</h4>
            </div>
        </div>
    </div>
    {{-- <h1>Selamat Datang {{ Auth::user()->name }}</h1> --}}
    
</div>

@endsection