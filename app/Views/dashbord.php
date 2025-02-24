<?= view('layout/header.php') ?>
<div class="container-fluid">
    <div class="align-items-center mb-4 text-center">
        <h1 class="h3 mb-0" style="color: #1d3557; font-weight: bold;">Dashboard Pembayaran SPP</h1>
        <p style="text-align: justify; font-size: 1.1rem; color: #6c757d; margin-top: 10px;">
            Selamat datang di dashboard pembayaran SPP sekolah. Sistem kami dirancang untuk membantu Anda
            mengelola administrasi sekolah dengan lebih praktis, modern, dan efisien.
            Temukan berbagai fitur unggulan kami yang siap mendukung kebutuhan Anda.
        </p>
    </div>

    <?php if (session()->role == 'admin'):?>
        <div class="row d-flex justify-content-center m-3">

        <div class="col-xl-3 col-sm-6 mb-4">
            <a href="<?= base_url('datasiswa') ?>" class="text-decoration-none">
                <div class="card shadow h-100 py-2" style="background: linear-gradient(135deg, #457b9d, #1d3557); border: none; border-radius: 10px;">
                    <div class="card-body text-white">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold">Data Siswa</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list fa-2x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-sm-6 mb-4">
            <a href="<?= base_url('transaksi') ?>" class="text-decoration-none">
                <div class="card shadow h-100 py-2" style="background: linear-gradient(135deg, #2a9d8f, #264653); border: none; border-radius: 10px;">
                    <div class="card-body text-white">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold">Bayar SPP</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-wave fa-2x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-sm-6 mb-4">
            <a href="<?= base_url('datauser') ?>" class="text-decoration-none">
                <div class="card shadow h-100 py-2" style="background: linear-gradient(135deg, #f4a261, #e76f51); border: none; border-radius: 10px;">
                    <div class="card-body text-white">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold">Data Admin</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card shadow h-100 py-2" style="background: linear-gradient(135deg, #e63946, #f3722c); border: none; border-radius: 10px;">
                    <div class="card-body text-white">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold">Data Kelas</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->
    </div>
    <?php endif?>

    <?php if(session()->role == 'siswa'):?>
        <div class="row d-flex justify-content-center m-3">

        <div class="col-xl-3 col-sm-6 mb-4">
            <a href="<?= base_url('datasiswa') ?>" class="text-decoration-none">
                <div class="card shadow h-100 py-2" style="background: linear-gradient(135deg, #457b9d, #1d3557); border: none; border-radius: 10px;">
                    <div class="card-body text-white">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold">Data Siswa</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list fa-2x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-sm-6 mb-4">
            <a href="<?= base_url('transaksi') ?>" class="text-decoration-none">
                <div class="card shadow h-100 py-2" style="background: linear-gradient(135deg, #2a9d8f, #264653); border: none; border-radius: 10px;">
                    <div class="card-body text-white">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold">Bayar SPP</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-wave fa-2x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php endif?>
</div>
<?= view('layout/footer.php') ?>