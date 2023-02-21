@extends('layout.main')
@section('content')

<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">FORM INPUT SURAT</h3>
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
                            <th>Nama Pemohon</th>
                            <th>Bidang</th>
                            <th>Jenis Surat</th>
                            <th>tgl_masuk</th>
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPengguna">
                                    <i class="fa  fa-edit"></i>Ubah
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPengguna">
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
@endsection