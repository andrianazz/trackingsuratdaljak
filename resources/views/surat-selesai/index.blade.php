@extends('layout.main')
@section('content')

<div class="page-heading">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            Jumlah Surat Belum Selesai
                        </div>
                        <div class="col-md-6 text-center font-extrabold" style="font-size: 24px;">
                            {{ count($data->where('status_surat','!=' ,6)) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            Jumlah Surat Selesai
                        </div>
                        <div class="col-md-6 text-center font-extrabold" style="font-size: 24px;">
                            {{ count($data->where('status_surat', 6)) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">Surat Selesai Kabid</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Bidang</th>
                            <th>Nama Pemohon</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Selesai</th>
                            <th>Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;

                        @endphp
                        @foreach ($data as $row )
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $row->bidang->nama_bidang }}</td>
                            <td>{{ $row->nama_pemohon }}</td>
                            <td>{{ $row->jenisSurat->jenis_surat }}</td>
                            <td>{{ $row->tgl_masuk }}</td>
                            <td>{{ $row->tgl_selesai }}</td>
                            <td>
                                @if($row->status_surat ==4)
                                <form action="/surat-selesai/{{ $row->id }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#hapusPengguna">
                                        <i class="fa  fa-edit"></i>Verifikasi
                                    </button>
                                </form>
                                @endif
                                @if($row->status_surat ==6)
                                Selesai
                                @endif
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