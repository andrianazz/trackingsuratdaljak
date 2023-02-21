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
                                <form action="/login/auth" method="post" style="text-align: left">
                                    @csrf
                                    <br>
                                    <div class="form-group text-center">
                                        <div class="row align-items-center">
                                            <div class="col-md-1">
                                                Perihal :
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="" placeholder="Masukkan Nama Pemohon / Perihal Surat" required>
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

<div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">

                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>


            <div class="modal-body">
                <input name="id" hidden id="idnya">
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Id. Pengajuan</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="id_pengajuan" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Nama Pegawai</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="nama_pegawai" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">NIP</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="nip" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Pangkat</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="pangkat" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Jabatan</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="jabatan" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Kota/Kabupaten</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="kab_kota" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Unit Kerja</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="unit_kerja" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Mulai Tanggal</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="mulai_tgl" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Hingga Tanggal</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="akhir_tgl" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Alamat</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="alamat" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Jenis Kelamin</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="jk" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">Jenis Cuti</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="jenis_cuti" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3  ">
                        <label class="col-form-label">Keterangan Cuti</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="ket_cuti" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label class="col-form-label">No Handphone</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" class="form-control" id="no_hp" readonly>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-13 col-3">
                        <label class="col-form-label">Blanko</label>
                    </div>
                    <div class="col-lg-6 col-7">
                        <input type="text" class="form-control" id="field_blanko" readonly>
                        <a class="btn btn-info" id="blanko" href="#" target="__blank">Lihat Berkas</a>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-13 col-3">
                        <label class="col-form-label">SK</label>
                    </div>
                    <div class="col-lg-6 col-7">
                        <input type="text" class="form-control" id="field_sk" readonly>
                        <a class="btn btn-info" id="sk" href="#" target="__blank">Lihat Berkas</a>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-13 col-3">
                        <label class="col-form-label">Surat Permohonan</label>
                    </div>
                    <div class="col-lg-6 col-7">
                        <input type="text" class="form-control" id="field_surat_permohonan" readonly>
                        <a class="btn btn-info" id="surat_permohonan" href="#" target="__blank">Lihat Berkas</a>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col-lg-13 col-3">
                        <label class="col-form-label">Surat Pengantar</label>
                    </div>
                    <div class="col-lg-6 col-7">
                        <input type="text" class="form-control" id="field_surat_pengantar" readonly>
                        <a class="btn btn-info" id="surat_pengantar" href="#" target="__blank">Lihat Berkas</a>
                    </div>
                </div>

                <br>

                <button type="submit" class="btn btn-success ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Terima</span>
                </button>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('css')
<!-- <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css"> -->
@endpush

@push('js')
<!-- <script src="/assets/js/pages/simple-datatables.js"></script> -->
@endpush