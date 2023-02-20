@extends('layout.main')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">Kelola Jenis Surat</h3>
                    </div>
                </div>
                <div class="row">
                    <form action="/store/jenissurat" method="post">
                        @csrf
                        <div class="col-md-7">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="jenis_surat" class="form-control" placeholder="Masukkan Jenis Surat.." id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="fa fa-file"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="reset" class="btn btn-light-secondary mb-1">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-success mb-1">
                                Tambahkan
                            </button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Jenis Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($data as $row )
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $row->jenis_surat }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editJenisSurat">
                                    <i class="fa  fa-edit"></i>Ubah
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusJenisSurat">
                                    <i class="fa  fa-trash"></i>Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade text-left" id="hapusJenisSurat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">
                    Hapus Jenis Surat
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah Kamu yakin ingin menghapus Jenis Surat ini
            </div>
            <form action="/destroy/jenissurat/{{ $row->id }}" method="post">
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection