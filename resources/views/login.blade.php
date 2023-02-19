<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Tracking Daljak</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="/logodinas.png" style="width: 10%" type="image/x-icon">
</head>

<body class="bg">
    <div class="row h-100 d-flex align-items-center justify-content-center">
        <div class="col-md-4">
            <div class="card p-1">
                <div class="card-body text-center">
                    <img src="/assets/images/logo/ic_bapenda.png" width="270" alt="">
                    <h4 class="text-uppercase text-dark text-center mt-2 mb-4" style="font-size:24px; font-weight: 600;">Selamat Datang</h4>
                    <h2 class="text-uppercase text-center text-dark" style="font-size:26px; font-weight: 600;">APLIKASI TRACKING SURAT <br> BIDANG PENGENDALIAN PAJAK</h2>
                    <form action="/login/auth" method="post" style="text-align: left">
                        @csrf
                        <br>
                        <div class="form-group text-center">
                            <div class="row">
                                <div class="col-md-1">
                                    <i class="bi bi-person-fill text-dark" style="font-size: 30px;"></i>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1">
                                    <i class="bi bi-lock-fill text-dark" style="font-size: 26px;"></i>
                                </div>
                                <div class="col-md-11">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        <!-- @if(session()->has('gagal'))
                        <small class="text-danger">{{session()->get('gagal')}}</h4>
                            @endif -->

                        @if ($message = Session::get('failed'))
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @endif

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-block fw-bold text-dark text-uppercase" style="background-color: #3594BC;">Login</button>
                        </div>
                    </form>

                    <p class="text-grey mt-5 mb-0">2023 © Bapenda Kota Pekanbaru</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>