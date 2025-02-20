<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | Pembayaran SPP Sekolah </title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/template/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .login-links a {
            font-weight: bold;
            text-decoration: none;
            color: #457b9d;
            transition: 0.3s;
        }

        .login-links a:hover {
            color: #1d3557;
        }

        .btn-login {
            background: #1d3557;
            color: #ffffff;
            font-weight: 600;
            border-radius: 30px;
            padding: 10px;
            width: 100%;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #457b9d;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row d-flex " style="justify-content: center; align-items: center;">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image d-flex align-items-center justify-content-center">
                                <img src="<?= base_url() ?>/spponline-logo.jpg" alt="Login Icon" style="width: 100%; ">
                            </div>

                            <div class="col-lg-6" style="background-color: rgb(249, 249, 249);">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                        <p>Akses pembayaran SPP sekolah dengan lebih mudah, cepat, dan praktis.</p>
                                    </div>
                                    <hr>

                                    <a href="<?= base_url('login') ?>" class="btn btn-login mb-2">Login</a>
                                    <p class="login-links text-center">Belum punya akun? <a href="<?= base_url('register') ?>">Daftar Sekarang</a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/template/js/sb-admin-2.min.js"></script>

</body>

</html>