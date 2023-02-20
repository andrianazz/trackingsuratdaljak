@extends('layout.main')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold">Kelola Bidang</h3>
                    </div>
                </div>
                <div class="row">
                    <form action="">
                        <div class="col-md-7">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Masukkan Bidang.." id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="fa fa-file"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="reset" class="btn btn-light-secondary mb-1">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-success mb-1">
                                Tambahkan
                            </button>

                        </div>
                    </form>
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
                                    <th data-sortable="" style="width: 5%;"><a href="#" class="dataTable-sorter">No.</a></th>
                                    <th data-sortable="" style="width: 65%;"><a href="#" class="dataTable-sorter">Bidang</a></th>
                                    <th data-sortable="" style="width: 30%;"><a href="#" class="dataTable-sorter">Aksi</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Sekretariat</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editJenisSurat">
                                            <i class="fa  fa-edit"></i>Ubah
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusJenisSurat">
                                            <i class="fa  fa-trash"></i>Hapus
                                        </button>
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

<div class="modal fade text-left" id="hapusJenisSurat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">
                    Hapus Bidang
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah Kamu yakin ingin menghapus Bidang ini
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Hapus</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection