<?= view('layout/header.php') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel </h1>
    <p class="mb-4">
        
    </p>

    <?php if (!empty(session()->getFlashdata('status'))) : ?>

        <div class="alert alert-success">
            <i class="fas fa-check"></i>
            <?php echo session()->getFlashdata('status'); ?>
        </div>

    <?php endif ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Siswa</h6>
                <a href="<?= base_url('datasiswa/create') ?>" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($siswa as $s) : ?>
                            <tr>
                                <td><?= $s['nis'] ?></td>
                                <td><?= $s['nama'] ?></td>
                                <td><?= $s['id_kelas'] ?></td>
                                <td><?= $s['id_jurusan'] ?></td>
                                <td>Rp. <?= number_format($s['jumlah'], 0, ',', '.') ?></td>

                                <td class="text-center">
                                    <a href="<?php echo base_url('datasiswa/edit/' . $s['id_siswa']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-wrench"></i> EDIT</a>
                                    <a href="<?php echo base_url('datasiswa/delete/' . $s['id_siswa']) ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('!!! Apakah Anda yakin ingin menghapus data ini? !!!');">
                                        <i class="fas fa-trash"></i>
                                        HAPUS
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?= view('layout/footer.php') ?>