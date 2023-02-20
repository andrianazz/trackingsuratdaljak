@extends('layout.main')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Data Pengguna Aplikasi Tracking Surat</h3>
                <p class="text-subtitle text-muted">Informasi pengguna aplikasi Tracking Surat Daljak</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">Kelola Pengguna</h3>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#large">
                            <i class="fa  fa-plus"></i>Tambah Data
                        </button>
                    </div>
                </div>
            </div>
              <div class="card-body">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>City</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Graiden</td>
                      <td>vehicula.aliquet@semconsequat.co.uk</td>
                      <td>076 4820 8838</td>
                      <td>Offenburg</td>
                      <td>
                        <span class="badge bg-success">Active</span>
                      </td>
                    </tr>
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
                    TAMBAH PENGGUNA
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="">
                <div class="modal-body">



                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6">
                            ID Pegawai<input type="text" id="id" class="form-control" name="" placeholder="Masukkan ID Pegawai...">
                        </div>
                        <div class="col-md-6 ">
                            Nama Pegawai<input type="text" id="nama" class="form-control" name="" placeholder="Masukkan Nama Pegawai...">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6">
                            Email Pegawai<input type="text" id="email" class="form-control" name="" placeholder="Masukkan Email Pegawai...">
                        </div>
                        <div class="col-md-6 ">
                            Username<input type="text" id="username" class="form-control" name="" placeholder="Masukkan Username...">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6">
                            Password<input type="password" id="password" class="form-control" name="" placeholder="Masukkan Password...">
                        </div>
                        <div class="col-md-6">
                            Konfirmasi Password<input type="password" id="password-confirm" class="form-control" name="" placeholder="Masukkan Konfirmasi Password...">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-2">Role</div>
                        <div class="col-md-10">
                            <input type="text" id="first-name" class="form-control" name="" placeholder="Masukkan role...">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-secondary">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
