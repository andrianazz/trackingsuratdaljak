@extends('layout.main')
@section('content')

<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">Disposisi Selesai</h3>
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
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;

                        @endphp
                        @foreach ($data as $row )
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $row->nama_pemohon }}</td>
                            <td>{{ $row->bidang->nama_bidang }}</td>
                            <td>{{ $row->jenisSurat->jenis_surat }}</td>
                            <td>{{ $row->tgl_masuk }}</td>
                            <td>{{ $row->tgl_selesai }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection