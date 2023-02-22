@extends('layout.main')

@section('content')
<div class="page-content">
    <section id="cari">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>SELAMAT DATANG DI APLIKASI TRACKING SURAT BIDANG PENGENDALIAN PAJAK</h4>
                        <h4>BERANDA INFORMASI</h4>

                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="lacak-surat text-center">
                                <h4>Lacak Surat</h4>
                                <form action="/show" method="post" style="text-align: left">
                                    @csrf
                                    <br>
                                    <div class="form-group text-center">
                                        <div class="row align-items-center">
                                            <div class="col-md-1">
                                                Perihal :
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" name="search" class="form-control" name="" placeholder="Masukkan Nama Pemohon / Perihal Surat" required>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-block fw-bold text-dark text-uppercase bg-success text-white">LACAK</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($data as $row)
                <div class="card mb-3 p-3">
                    <div class="p-4 text-center text-white text-lg rounded-top" style="background-color: #435ebe"><span class="text-uppercase">Tracking Surat</span><span class="text-medium"> {{ $row->indeks_surat }}</span></div>
                    <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2" style="background-color: #374250">
                        <div class="w-100 text-light text-center py-1 px-2"><span class="text-medium">Nama Pemohon:</span> {{$row->nama_pemohon}}</div>
                        <div class="w-100 text-light text-center py-1 px-2"><span class="text-medium">Disposisi dari:</span> {{ $row->bidang->nama_bidang }}</div>
                        <div class="w-100 text-light text-center py-1 px-2"><span class="text-medium">Disposisi ke:</span> {{ $row->subBidang->nama_sub_bidang }}</div>
                        <div class="w-100 text-light text-center py-1 px-2"><span class="text-medium">Tanggal Masuk:</span> {{ $row->tgl_masuk }} </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body pb-0 px-0 mb-0 mx-0">
                            <div class="mb-0 pb-0 steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                <div class="step {{ $row->status_surat >= 1  ? 'completed': '' }} ">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="bi bi-laptop"></i></div>
                                    </div>
                                    <h4 class="step-title">Admin</h4>
                                </div>
                                <div class="step {{ $row->status_surat >= 2   ? 'completed': '' }}">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="bi bi-person-fill"></i></div>
                                    </div>
                                    <h4 class="step-title">Kabid</h4>
                                </div>
                                <div class="step {{ $row->status_surat >= 3 ? 'completed': '' }}">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="bi bi-clock-history"></i></div>
                                    </div>
                                    <h4 class="step-title">Proses Kasubid</h4>
                                </div>
                                <div class="step {{ $row->status_surat >= 4 ? 'completed': '' }}">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="bi bi-file-earmark-richtext-fill"></i></div>
                                    </div>
                                    <h4 class="step-title">Selesai Kasubid</h4>
                                </div>
                                <div class="step {{ $row->status_surat >= 5 ? 'completed': '' }}">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="bi bi-person-check-fill"></i></div>
                                    </div>
                                    <h4 class="step-title">Selesai Kabid</h4>
                                </div>
                                <div class="step {{ $row->status_surat >= 6 ? 'completed': '' }}">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="bi bi-file-check-fill"></i></div>
                                    </div>
                                    <h4 class="step-title">Selesai Admin</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>



@endsection

@push('css')
<!-- <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css"> -->
@endpush

@push('js')
<!-- <script src="/assets/js/pages/simple-datatables.js"></script> -->
@endpush