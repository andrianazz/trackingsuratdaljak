@extends('layout.main')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">Kelola Bidang</h3>
                    </div>
                </div>
                <form action="/bidang/store" method="POST">
                    @csrf
                    <div class="row">
                            <div class="col-md-9">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input required type="text" name="nama_bidang" class="form-control" placeholder="Masukkan Nama Bidang..." id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <button type="reset" class="btn btn-light-secondary mb-1">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-success mb-1">
                                    Tambahkan
                                </button>
                            </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th style="width:5%">No. </th>
                            <th style="width:70%">Bidang</th>
                            <th style="width:25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data as $row )
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $row->nama_bidang }}</td>
                            <td class="text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBidang{{$row->id}}">
                                    <i class="fa  fa-edit"></i>Ubah
                                </button>

                                <div class="modal fade text-left" id="editBidang{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="editModal{{$row->id}}">
                                                    Ubah Bidang
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>

                                            <form action="/bidang/{{$row->id}}" method="post">
                                            @method('put')
                                            @csrf
                                                <div class="modal-body text-center">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="nama_bidang" class="form-control" placeholder="Masukkan Nama Bidang..." value="{{$row->nama_bidang}}" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
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

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusBidang{{$row->id}}">
                                    <i class="fa  fa-edit"></i>Hapus
                                </button>

                                <div class="modal fade text-left" id="hapusBidang{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="delteModal{{$row->id}}">
                                                    Hapus Jenis Surat
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                Apakah anda yakin ingin menghapus {{$row->nama_bidang}}?
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tutup</span>
                                                    </button>
                                                    <form action="/bidang/{{ $row->id }}" method="post">
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

@endsection
