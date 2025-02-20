<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Siswa</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/datasiswa/store') ?>" method="POST">
                            <div class="form-grup mb-2">
                                <label for="">NIS</label>
                                <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" required>
                            </div>
                            <div class="form-grup mb-2">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="form-grup mb-2">
                                <label for="">Kelas</label><br>
                                <select name="id_kelas" class="form-select" required>
                                    <option value="">Masukkan Kelas</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            <div class="form-grup mb-4">
                                <label for="">Jurusan</label><br>
                                <select name="id_jurusan" class="form-select" required>
                                    <option value="">Masukkan Jurusan</option>
                                    <option value="TKRO 1">TKRO 1</option>
                                    <option value="TKRO 2">TKRO 2</option>
                                    <option value="TKRO 3">TKRO 3</option>
                                    <option value="TKRO 4">TKRO 4</option>
                                    <option value="TKRO 5">TKRO 5</option>
                                    <option value="TBSM 1">TBSM 1</option>
                                    <option value="TBSM 2">TBSM 2</option>
                                    <option value="TBSM 3">TBSM 3</option>
                                    <option value="TBSM 4">TBSM 4</option>
                                    <option value="TBSM 5">TBSM 5</option>
                                    <option value="TJKT 1">TJKT 1</option>
                                    <option value="TJKT 2">TJKT 2</option>
                                    <option value="TJKT 3">TJKT 3</option>
                                    <option value="TJKT 4">TJKT 4</option>
                                    <option value="TJKT 5">TJKT 5</option>
                                    <option value="PPLG 1">PPLG 1</option>
                                    <option value="PPLG 2">PPLG 2</option>
                                    <option value="TB 1">TB 1</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                            <a href="<?= base_url('/datasiswa') ?>" class="btn btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>