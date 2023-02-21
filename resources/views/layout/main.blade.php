<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLIKASI TRACKING SURAT BIDANG PENGENDALIAN PAJAK</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('css')
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="assets/css/pages/simple-datatables.css">

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="shortcut icon" href="assets/images/logo/ic_bapenda.png" style="width: 10%" type="image/x-icon">


</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <div class="text-center">
                            <img style="width: 90%" src="assets/images/logo/ic_bapenda.png">
                        </div>

                        <div style="margin-top: 50px;"></div>

                        <li class="sidebar-item ">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-house-door-fill"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-file-earmark-richtext-fill"></i>
                                <span>Input Surat</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-clipboard-data"></i>
                                <span>Disposisi Selesai</span>
                            </a>
                        </li>
                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-stack "></i>
                                <span>Data Master</span>
                            </a>
                            <ul class="submenu" style="display: none;">
                                <li class="submenu-item">
                                    <a href="/bidang">Bidang</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/sub-bidang">Sub Bidang</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/jenis-surat">Jenis Surat</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="/pengguna">Pengguna</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="">
                <div class="card">
                    <div class="card-header">
                        <b>APLIKASI TRACKING SURAT BIDANG PENGENDALIAN PAJAK</b>
                        <a style="float: right; cursor: pointer">
                            <i class="bi bi-box-arrow-right" onclick="location.href='/logout'"></i>
                        </a>
                    </div>
                </div>
            </div>
            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-end">
                        <p>{{ \Carbon\Carbon::now()->year }} &copy; Badan Pendapatan Daerah</p>
                    </div>

                </div>
            </footer>
        </div>
    </div>

    @if (session('sukses'))
    <script>
        Toastify({
            text: "{{ session('sukses') }}",
            duration: 3000,
            close: true,
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
        }).showToast();
    </script>
    @endif
    @if (session('error'))
    <script>
        Toastify({
            text: "{{ session('error') }}",
            duration: 3000,
            close: true,
            backgroundColor: "linear-gradient(to right, #00b09b, #c93d3d)",
        }).showToast();
    </script>
    @endif




    @stack('js')

    <script src="assets/js/app.js"></script>
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/js/pages/simple-datatables.js"></script>


</body>

</html>