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
                                                <!-- <div class="form-group choices">
                                                    <select class="form-select " name="search" required>
                                                        @foreach($data as $row)
                                                        <option value="{{ $row->nama_pemohon }}"> {{ $row->indeks_surat }} || {{ $row->nama_pemohon }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> -->
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