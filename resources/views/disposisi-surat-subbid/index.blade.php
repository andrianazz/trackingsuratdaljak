@extends('layout.main')
@section('content')

<div class="page-heading">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            Jumlah Surat Disposisi
                        </div>
                        <div class="col-md-6 text-center font-extrabold" style="font-size: 24px;">
                            {{ count($data) }}
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
                        <h3 class="fw-bold">Disposisi Surat Kasubid</h3>
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
                            <th>Keterangan</th>
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
                            <td>

                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#disposisi{{$row->id}}">
                                    <i class="fa  fa-plus"></i>Detail
                                </button>


                                <div class="modal fade text-left" id="disposisi{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="disposisi{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="disposisi{{$row->id}}">
                                                    Disposisi Surat
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="/disposisi-surat-subbid/{{$row->id}}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row justify-content-center align-items-center mb-2">
                                                        <div class="col-md-3">
                                                            Indeks Surat
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" id="indeks_surat" class="form-control" value="{{$row->indeks_surat}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-2">
                                                        <div class="col-md-3">
                                                            Tanggal Masuk
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" value="{{ $row->tgl_masuk }}" max="{{ date('Y-m-d') }}" id="fullname" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-2">
                                                        <div class="col-md-3">
                                                            Disposisi Dari
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$row->bidang->nama_bidang}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-2">
                                                        <div class="col-md-3">
                                                            Nama Pemohon
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$row->nama_pemohon}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-2">
                                                        <div class="col-md-3">
                                                            Jenis Surat
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$row->jenisSurat->jenis_surat}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-2">
                                                        <div class="col-md-3">
                                                            Disposisi Ke
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$row->subBidang->nama_sub_bidang}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            Detail Disposisi
                                                        </div>
                                                        <div class="col-md-9">
                                                            <textarea name="catatan" rows="5" cols="60%" disabled>{{$row->catatan}}</textarea>
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
                                                        <span class="d-none d-sm-block">Proses</span>
                                                    </button>
                                                </div>
                                            </form>
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
