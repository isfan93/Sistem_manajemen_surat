@extends('layouts.main')
@section('content')
@section('breadcrumb', 'User')
@section('title', 'User')
    
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
                            <th>Nama</th>
                            <th>username</th>
                            <th>email</th>
                            <th>Role</th>
                            <th>Opsional</th>
                        </tr>
                    </thead>
                    @php
                        $no=1;
                    @endphp
                    <tbody>
                        @foreach ($user as $us)
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $us->name }}</td>
                            <td>{{ $us->username }}</td>
                            <td>{{ $us->email }}</td>
                            <td>{{ $us->role }}</td>
                            <td>
                                {{-- <a href="surat masuk/{{ $srt->doc }}" class="btn btn-primary text-white card-hover">Download</a> --}}
                                <a href="" class="btn btn-warning text-white card-hover" data-bs-toggle="modal" data-bs-target="#editData{{ $us->id }}">Edit</a>
                                {{-- <a href="" class="btn btn-success text-white card-hover">Disp</a> --}}
                                <a class="btn btn-danger text-white card-hover delete" data-id="{{ $us->id }}" data-nama="{{ $us->username }}">Hapus</a>
                            </td>
                        </tr>

                        <div class="modal fade" id="editData{{ $us->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="user/update/{{ $us->id }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nama</label>
                                        <input type="text" class="form-control" id="recipient-name" name="name" value="{{ $us->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" id="recipient-name" name="username" value="{{ $us->username }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Email</label>
                                        <input type="text" class="form-control" id="recipient-name" name="email" value="{{ $us->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Role</label>
                                        <input type="text" class="form-control" id="recipient-name" name="role" value="{{ $us->role }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">password</label>
                                        <input type="text" class="form-control" id="recipient-name" name="password" value="{{ $us->password }}">
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


                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $surat_m->links() }} --}}
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
        <form action="{{ route('add-user') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">name</label>
                <input type="text" class="form-control" id="recipient-name" name="name" value="">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Username</label>
                <input type="text" class="form-control" id="recipient-name" name="username" value="">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">email</label>
                <input type="text" class="form-control" id="recipient-name" name="email" value="">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Role</label>
                <input type="text" class="form-control" id="recipient-name" name="role" value="">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">password</label>
                <input type="password" class="form-control" id="recipient-name" name="password" value="">
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<script>
    $('.delete').click(function(){
        var id_user = $(this).attr('data-id');
        var username = $(this).attr('data-nama');

        swal({
        title: "Yakin?",
        text: "Kamu akan menghapus surat dari "+username+" ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/user/hapus/"+id_user+""
            swal("Data Berhasil dihapus ", {
            icon: "success",
            });
        } else {
            swal("Data tidak dihapus");
        }
        });
    });
    
</script>
@endsection