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
                                        <div class="row">

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="" placeholder="Masukkan Nama Pemohon / Nomor Surat" required>
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
<link rel="stylesheet" href="/assets/css/pages/simple-datatables.css">
@endpush

@push('js')
<script src="/assets/js/pages/simple-datatables.js"></script>
@endpush
