<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Edit Data Siswa</title>
</head>

<body class="bg-primary">

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Siswa</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('/datasiswa/update/' . $siswa['id_siswa']) ?>" method="POST">
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
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            <div class="form-grup mb-4">
                                <label for="">Jurusan</label><br>
                                <select name="id_jurusan" class="form-select" required>
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
                            <!-- <div class="form-grup mb-2">
                                <label for="">Angkatan</label><br>
                                <select name="id_angkatan" class="form-select" required>
                                    <option value="">Masukkan Angkatan</option>
                                    <option value="2022/2023">2022/2023</option>
                                    <option value="2023/2024">2023/2024</option>
                                    <option value="2024/2025">2024/2025</option>
                                </select>
                            </div> -->
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                            <a class="btn btn-danger" href="<?php echo base_url('/datasiswa') ?>">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>