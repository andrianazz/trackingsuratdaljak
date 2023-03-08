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

    <link rel="stylesheet" href="/assets/css/style2.css">
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

                        <li class="sidebar-item {{ Request::is('/')  ? 'active' : '' }}">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-house-door-fill"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        @if(Auth::user()->role === 'adminbidang' || Auth::user()->role === 'master')
                        <li class="sidebar-item {{ Request::is('input-surat')  ? 'active' : '' }}">
                            <a href="/input-surat" class='sidebar-link'>
                                <i class="bi bi-file-earmark-richtext-fill"></i>
                                <span>Input Surat</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('disposisi-selesai')  ? 'active' : '' }}">
                            <a href="/disposisi-selesai" class='sidebar-link'>
                                <i class="bi bi-clipboard-data"></i>
                                <span>Disposisi Selesai</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->role === 'kabid' || Auth::user()->role === 'master')
                        <li class="sidebar-item {{ Request::is('disposisi-surat')  ? 'active' : '' }}">
                            <a href="/disposisi-surat" class='sidebar-link'>
                                <i class="bi bi-clipboard-data"></i>
                                <span>Disposisi Surat {{ Auth::user()->role === 'master' ? '(Kabid)' : '' }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('surat-selesai')  ? 'active' : '' }}">
                            <a href="/surat-selesai" class='sidebar-link'>
                                <i class="bi bi-clipboard-data"></i>
                                <span>Surat Selesai {{ Auth::user()->role === 'master' ? '(Kabid)' : '' }}</span>
                            </a>
                        </li>
                        @endif

                        @if(str_contains(Auth::user()->role , 'subbidang') || Auth::user()->role === 'master')
                        <li class="sidebar-item {{ Request::is('disposisi-surat-subbid')  ? 'active' : '' }}">
                            <a href="/disposisi-surat-subbid" class='sidebar-link'>
                                <i class="bi bi-clipboard-data"></i>
                                <span>Disposisi Surat {{ Auth::user()->role === 'master' ? '(Subbid)' : '' }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('surat-selesai-subbid')  ? 'active' : '' }}">
                            <a href="/surat-selesai-subbid" class='sidebar-link'>
                                <i class="bi bi-clipboard-data"></i>
                                <span>Surat Selesai {{ Auth::user()->role === 'master' ? '(Subbid)' : '' }}</span>
                            </a>
                        </li>
                        @endif

                        @if( Auth::user()->role === 'master')
                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-stack "></i>
                                <span>Data Master</span>
                            </a>
                            <ul class="submenu" style="display: none;">
                                <li class="submenu-item {{ Request::is('bidang')  ? 'active' : '' }}">
                                    <a href="/bidang">Bidang</a>
                                </li>
                                <li class="submenu-item {{ Request::is('sub-bidang')  ? 'active' : '' }}">
                                    <a href="/sub-bidang">Sub Bidang</a>
                                </li>
                                <li class="submenu-item {{ Request::is('jenis-surat')  ? 'active' : '' }}">
                                    <a href="/jenis-surat">Jenis Surat</a>
                                </li>
                                <li class="submenu-item {{ Request::is('pengguna')  ? 'active' : '' }}">
                                    <a href="/pengguna">Pengguna</a>
                                </li>

                            </ul>
                        </li>
                        @endif

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
                        <a style="cursor: pointer">
                            <i style="float: right;" class="bi bi-box-arrow-right mx-4" onclick="location.href='/logout'"></i>
                            <h4 style="float: right;"> {{ Auth::user()->nama_user }}</h4>
                        </a>
                    </div>
                </div>
            </div>
            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-end">
                        <p>{{ \Carbon\Carbon::now()->year }} &copy; Created and Developed by PT. STRATA DIGITAL</p>
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