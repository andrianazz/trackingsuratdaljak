@extends('layout.main')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">Kelola Pengguna</h3>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#large">
                            <i class="fa  fa-plus"></i>Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Pengguna </th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data as $row )
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $row->nama_user }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->role }}</td>
                            <td class="text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPengguna{{$row->id}}">
                                    <i class="fa  fa-edit"></i>Ubah
                                </button>

                                <div class="modal fade text-left" id="editPengguna{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="editModal{{$row->id}}">
                                                    Ubah Pengguna
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>

                                            <form action="/pengguna/{{$row->id}}" method="post">
                                                @method('put')
                                                @csrf
                                                <div class="modal-body text-start">
                                                    <div class="row justify-content-center mb-2">
                                                        <div class="col-md-6">
                                                            <b>ID Pegawai</b><input type="text" id="id" value="{{$row->id_pegawai}}" class="form-control" name="id_pegawai" placeholder="Masukkan ID Pegawai...">
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <b>Nama Pegawai</b><input type="text" id="nama" value="{{$row->nama_user}}" class="form-control" name="nama_user" placeholder="Masukkan Nama Pegawai...">
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-2">
                                                        <div class="col-md-6">
                                                            <b>Email Pegawai</b><input type="text" id="email" value="{{$row->email_user}}" class="form-control" name="email_user" placeholder="Masukkan Email Pegawai...">
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <b>Username</b><input type="text" id="username" value="{{$row->username}}" class="form-control" name="username" placeholder="Masukkan Username...">
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-2">
                                                        <div class="col-md-6">
                                                            <b>Password</b><input type="password" id="password" class="form-control" name="password" placeholder="Masukkan Password...">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Konfirmasi Password</b><input type="password" id="password-confirm" class="form-control" name="password2" placeholder="Masukkan Konfirmasi Password...">
                                                        </div>
                                                        <div style="color:red;">
                                                            *Kosongkan jika tidak mengubah password
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-2">
                                                        <div class="col-md-6"></div>
                                                        <div class="col-md-6"></div>
                                                    </div>
                                                    <div class="row d-block justify-content-center mb-2">
                                                        <div class="col-md-2"><b>Role</b></div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <select class="choices form-select" name="role">
                                                                    <option value="kabid">Kepala Bidang</option>
                                                                    <option value="adminbidang">Admin Bidang</option>
                                                                    @foreach ($subbid as $sub )
                                                                    <option value="subbidang{{$row->id}}">{{ $sub->nama_sub_bidang }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tutup</span>
                                                    </button>
                                                    <button class="btn btn-danger">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Ubah</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPengguna{{$row->id}}">
                                    <i class="fa  fa-edit"></i>Hapus
                                </button>

                                <div class="modal fade text-left" id="hapusPengguna{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel{{$row->id}}">
                                                    Hapus Pengguna
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                Apakah anda yakin ingin menghapus {{$row->nama_user}}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tutup</span>
                                                </button>
                                                <form action="/pengguna/{{ $row->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabelTambah" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelTambah">
                    TAMBAH PENGGUNA
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="/pengguna/store" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6">
                            ID Pegawai<input type="text" id="id" class="form-control" name="id_pegawai" placeholder="Masukkan ID Pegawai...">
                        </div>
                        <div class="col-md-6 ">
                            Nama Pegawai<input type="text" id="nama" class="form-control" name="nama_user" placeholder="Masukkan Nama Pegawai...">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6">
                            Email Pegawai<input type="text" id="email" class="form-control" name="email_user" placeholder="Masukkan Email Pegawai...">
                        </div>
                        <div class="col-md-6 ">
                            Username<input type="text" id="username" class="form-control" name="username" placeholder="Masukkan Username...">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6">
                            Password<input type="password" id="password" class="form-control" name="password" placeholder="Masukkan Password...">
                        </div>
                        <div class="col-md-6">
                            Konfirmasi Password<input type="password" id="password-confirm" class="form-control" name="password2" placeholder="Masukkan Konfirmasi Password...">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row d-block justify-content-center mb-2">
                        <div class="col-md-2">Role</div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select class="choices form-select" name="role">
                                    <option value="kabid">Kepala Bidang</option>
                                    <option value="adminbidang">Admin Bidang</option>
                                    @foreach ($subbid as $row )
                                    <option value="subbidang{{$row->id}}">{{ $row->nama_sub_bidang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-secondary">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection