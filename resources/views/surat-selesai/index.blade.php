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
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifikasi{{$row->id}}">
                                        <i class="fa  fa-edit"></i>Verifikasi
                                    </button>

                                    <div class="modal fade text-left" id="verifikasi{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="verifikasi{{$row->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="verifikasi{{$row->id}}">
                                                        Verifikasi Surat
                                                    </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                                    <form action="/surat-selesai/{{ $row->id }}" method="post">
                                                    @method('PUT')
                                                    @csrf

                                                    <input type="date" value="{{ date('Y-m-d') }}" name="date" hidden>
                                                    <input type="time" value="{{ date('H:m:s') }}" name="time" hidden>
                                                    <div class="modal-body">
                                                        <div class="row justify-content-center align-items-center mb-2">
                                                            <div class="col-md-3">
                                                                Nomor Surat
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input disabled value="{{$row->verifikasiSurat->nomor_surat}}" name="nomor_surat" type="text" id="nomor_surat" class="form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center mb-2">
                                                            <div class="col-md-3">
                                                                Nama WP
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input disabled value="{{$row->verifikasiSurat->nama_wp}}" type="text" name="nama_wp" value=""  id="nama_wp" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center mb-2">
                                                            <div class="col-md-3">
                                                                NPWPD
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input disabled value="{{$row->verifikasiSurat->npwpd}}" name="npwpd" type="text" class="form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center mb-2">
                                                            <div class="col-md-3">
                                                                Tanggal Selesai Surat
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input disabled value="{{$row->verifikasiSurat->tgl_selesai_surat}}" type="date" name="tgl_selesai_surat" class="form-control" value="" >
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-3">
                                                                Hasil Surat
                                                            </div>
                                                            <div class="col-md-9">
                                                                <textarea disabled name="hasil_surat" rows="5" cols="60%">{{$row->verifikasiSurat->hasil_surat}}</textarea>
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
                                @endif
                                @if($row->status_surat ==6)
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#lihatSurat{{$row->id}}">
                                        <i class="fa  fa-edit"></i>Selesai
                                    </button>
                                    <div class="modal fade text-left" id="lihatSurat{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="lihatSurat{{$row->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="verifikasi{{$row->id}}">
                                                        Lihat Surat
                                                    </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                                    <div class="modal-body">
                                                        <div class="row justify-content-center align-items-center mb-2">
                                                            <div class="col-md-3">
                                                                Nomor Surat
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input disabled value="{{$row->verifikasiSurat->nomor_surat}}" name="nomor_surat" type="text" id="nomor_surat" class="form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center mb-2">
                                                            <div class="col-md-3">
                                                                Nama WP
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input disabled value="{{$row->verifikasiSurat->nama_wp}}" type="text" name="nama_wp" value=""  id="nama_wp" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center mb-2">
                                                            <div class="col-md-3">
                                                                NPWPD
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input disabled value="{{$row->verifikasiSurat->npwpd}}" name="npwpd" type="text" class="form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center mb-2">
                                                            <div class="col-md-3">
                                                                Tanggal Selesai Surat
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input disabled value="{{$row->verifikasiSurat->tgl_selesai_surat}}" type="date" name="tgl_selesai_surat" class="form-control" value="" >
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-3">
                                                                Hasil Surat
                                                            </div>
                                                            <div class="col-md-9">
                                                                <textarea disabled name="hasil_surat" rows="5" cols="60%">{{$row->verifikasiSurat->hasil_surat}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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