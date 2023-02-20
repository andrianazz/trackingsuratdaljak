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
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                    <div class="dataTable-top">
                        <div class="dataTable-dropdown"><select class="dataTable-selector form-select">
                                <option value="5">5</option>
                                <option value="10" selected="">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                            </select><label> entries per page</label></div>
                        <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div>
                    </div>
                    <div class="dataTable-container">
                        <table class="table table-striped dataTable-table" id="table1">
                            <thead>
                                <tr>
                                    <th data-sortable="" style="width: 5%;"><a href="#" class="dataTable-sorter">Nomor</a></th>
                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Username</a></th>
                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Role</a></th>
                                    <th data-sortable="" style="width: 35%;"><a href="#" class="dataTable-sorter">Nama Pengguna</a></th>
                                    <th data-sortable="" style="width: 30%;"><a href="#" class="dataTable-sorter">Aksi</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>andrianazz</td>
                                    <td>admin</td>
                                    <td>Andrian Wahyu</td>
                                    <td>
                                        <a href="#" class="btn icon icon-left btn-primary"><i class="fa fa-edit"></i>Ubah</a>
                                        <a href="#" class="btn icon icon-left btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>saskiazz</td>
                                    <td>user</td>
                                    <td>Muhammad Saski</td>
                                    <td>
                                        <a href="#" class="btn icon icon-left btn-primary"><i class="fa fa-edit"></i>Ubah</a>
                                        <a href="#" class="btn icon icon-left btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="dataTable-bottom">
                        <div class="dataTable-info">Showing 1 to 10 of 26 entries</div>
                        <nav class="dataTable-pagination">
                            <ul class="dataTable-pagination-list pagination pagination-primary">
                                <li class="active page-item"><a href="#" data-page="1" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" data-page="2" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" data-page="3" class="page-link">3</a></li>
                                <li class="pager page-item"><a href="#" data-page="2" class="page-link">›</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
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
                            ID Pegawai<input type="text" id="first-name" class="form-control" name="" placeholder="Masukkan ID Pegawai...">
                        </div>
                        <div class="col-md-6 ">
                            Nama Pegawai<input type="text" id="first-name" class="form-control" name="" placeholder="Masukkan Nama Pegawai...">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6">
                            Email Pegawai<input type="text" id="first-name" class="form-control" name="" placeholder="Masukkan Email Pegawai...">
                        </div>
                        <div class="col-md-6 ">
                            Username<input type="text" id="first-name" class="form-control" name="" placeholder="Masukkan Username...">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6">
                            Password<input type="password" id="first-name" class="form-control" name="" placeholder="Masukkan Password...">
                        </div>
                        <div class="col-md-6">
                            Konfirmasi Password<input type="password" id="first-name" class="form-control" name="" placeholder="Masukkan Konfirmasi Password...">
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