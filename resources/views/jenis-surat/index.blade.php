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
                <form action="/jenis-surat/store" method="post">
                @csrf
                <div class="row">
                        <div class="col-md-9">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="jenis_surat" class="form-control" placeholder="Masukkan Jenis Surat.." id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-file-earmark-text-fill"></i>
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
                            <th>No. </th>
                            <th>Jenis Surat</th>
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
                            <td>{{ $row->jenis_surat }}</td>
                            <td class="text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editJenisSurat{{$row->id}}">
                                    <i class="fa  fa-edit"></i>Ubah
                                </button>
                                <div class="modal fade text-left" id="editJenisSurat{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="editModal{{$row->id}}">
                                                    Ubah Jenis Surat
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>

                                            <form action="/jenis-surat/{{$row->id}}" method="post">
                                            @method('put')
                                            @csrf
                                                <div class="modal-body text-center">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="jenis_surat" class="form-control" placeholder="Masukkan Jenis Surat..." value="{{$row->jenis_surat}}" id="first-name-icon">
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

                                <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#hapusJenisSurat{{$row->id}}">
                                    <i class="fa  fa-edit"></i>Hapus
                                </button>
                                <div class="modal fade text-left" id="hapusJenisSurat{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel{{$row->id}}">
                                                    Hapus Jenis Surat
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                Apakah anda yakin ingin menghapus {{$row->jenis_surat}}?
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tutup</span>
                                                    </button>
                                                    <form action="/jenis-surat/{{ $row->id }}" method="post">
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
