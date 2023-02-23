@extends('layout.main')
@section('content')

<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">Form Input Surat</h3>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#large">
                            <i class="fa  fa-plus"></i>Tambah Surat
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Indeks Surat </th>
                            <th>Tanggal Masuk</th>
                            <th>Disposisi dari</th>
                            <th>Nama Pemohon</th>
                            <th>Jenis Surat</th>
                            <th>Disposisi ke</th>
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
                            <td>{{ $row->indeks_surat }}</td>
                            <td>{{ $row->tgl_masuk }}</td>
                            <td>{{ $row->bidang->nama_bidang }}</td>
                            <td>{{ $row->nama_pemohon }}</td>
                            <td>{{ $row->jenisSurat->jenis_surat }}</td>
                            <td>{{ $row->subBidang->nama_sub_bidang }}</td>
                            <td class="text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSurat{{$row->id}}">
                                    <i class="fa  fa-edit"></i>Ubah
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusSurat{{$row->id}}">
                                    <i class="fa  fa-edit"></i>Hapus
                                </button>

                                <div class="modal fade text-left" id="hapusSurat{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel{{$row->id}}">
                                                    Hapus Surat
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                Apakah anda yakin ingin menghapus {{$row->indeks_surat}}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tutup</span>
                                                </button>
                                                <form action="/input-surat/{{ $row->id }}" method="post">
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

<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">
                    TAMBAH SURAT
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="/input-surat/store" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row justify-content-center align-items-center mb-2">
                        <div class="col-md-3">
                            Indeks Surat
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="indeks_surat" id="indeks_surat" class="form-control" placeholder="Masukkan Indeks Surat..." required>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-3">
                            Tanggal Masuk
                        </div>
                        <div class="col-md-9">
                            @php
                            date_default_timezone_set('Asia/Jakarta')
                            @endphp
                            <input type="datetime-local" name="tgl_masuk" value="{{ date('Y-m-d H:i:00') }}" max="{{ date('Y-m-d') }}" id="fullname" class="form-control" required>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-md-3">
                            Disposisi Dari
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select class="choices form-select" name="bidang_id" required>
                                    <option value="">Pilih Bidang</option>
                                    @foreach ($bidang as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_bidang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-3">
                            Nama Pemohon
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="nama_pemohon" id="indeks_surat" class="form-control" placeholder="Masukkan Nama Pemohon..." required>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            Jenis Surat
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select class="choices form-select" name="jenis_surat_id" required>
                                    <option value="">Pilih Jenis Surat</option>
                                    @foreach ($jenisSurat as $row)
                                    <option value="{{ $row->id }}">{{ $row->jenis_surat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            Disposisi Ke
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select class="choices form-select" name="sub_bidang_id" required>
                                    <option value="">Pilih Sub Bidang</option>
                                    @foreach ($subBidang as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_sub_bidang }}</option>
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