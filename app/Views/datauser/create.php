<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-primary">

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-5">
                <?php if (isset($validation)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors() ?>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Admin</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/datauser/store') ?>" method="POST">
                            <div class="form-grup mb-2">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control"  placeholder="Masukkan username" required>
                            </div>
                            <div class="form-grup mb-2">
                                <label for="">Nis</label>
                                <input type="text" name="nis" class="form-control"  placeholder="Masukkan nis" required>
                            </div>
                            <div class="form-grup mb-4">
                                <label for="">Role</label>
                                <select name="role" class="form-select" required>
                                    <option value="admin">admin</option>
                                    <option value="siswa">siswa</option>
                                </select>
                            </div>
                            <div class="form-grup mb-4">
                                <label for="">Password</label>
                                <input type="password" name="userpassword" class="form-control" placeholder="Masukkan password baru">
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                            <a href="<?= base_url('/datauser') ?>" class="btn btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>