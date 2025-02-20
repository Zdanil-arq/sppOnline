<?= view('layout/header') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">
        DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the 
    </p>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>

        <div class="alert alert-success">
            <i class="fas fa-check"></i>
            <?php echo session()->getFlashdata('message'); ?>
        </div>

    <?php endif ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
                <a href="<?= base_url('datauser/create') ?>" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID user</th>
                            <th>Username</th>
                            <th>nis</th>
                            <th>role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID user</th>
                            <th>Username</th>
                            <th>nis</th>
                            <th>role</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($users as $u) : ?>
                            <tr>
                                <td><?= $u['id_user'] ?></td>
                                <td><?= $u['username'] ?></td>
                                <td><?= $u['nis'] ?></td>
                                <td><?= $u['role'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('datauser/edit/' . $u['id_user']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-wrench"></i> EDIT</a>
                                    <a href="<?= base_url('datauser/delete/' . $u['id_user']) ?>"
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

<?= view('layout/footer') ?>