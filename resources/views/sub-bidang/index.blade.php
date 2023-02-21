@extends('layout.main')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">Kelola Sub Bidang</h3>
                    </div>
                </div>
                <div class="row">
                    <form action="/store/sub-bidang" method="POST">
                        @csrf
                        <div class="col-md-7">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="nama_sub_bidang" class="form-control" placeholder="Masukkan Sub Bidang.." id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-file-earmark-text-fill"></i>
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
                            <th style="width:5%">No. </th>
                            <th style="width:70%">Sub Bidang</th>
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
                            <td>{{ $row->nama_sub_bidang }}</td>
                            <td class="text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editJenisSurat">
                                    <i class="fa  fa-edit"></i>Ubah
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusSubBidang">
                                    <i class="fa  fa-edit"></i>Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade text-left" id="hapusSubBidang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">
                    Hapus Sub Bidang
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah Kamu yakin ingin menghapus Sub Bidang ini
            </div>
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
        </div>
    </div>
</div>
@endsection