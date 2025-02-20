<?= view('layout/header') ?>

<div class="container mt-4">
    <form action="<?= base_url('/transaksi/search') ?>" method="POST">
        <div class="input-group mb-3">
            <input type="text" name="nis" class="form-control bg-light shadow border-1 small " placeholder="Masukkan NIS"
                aria-label="Search" aria-describedby="basic-addon2" required>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
        <h6 class="text-danger pt-1">Masukkan NIS untuk mencari siswa*</h6>
    </form>

    <div class="mt-4">
        <?php if (isset($siswa)): ?>
            <?php $no = 1; ?>
            <div class="card shadow mb-4  border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase"><?= $siswa['nama'] ?></h6>
                </div>
                <div class="">
                    <table class="table ">
                        <tr>
                            <td class=""><strong>NIS</strong></td>
                            <td>:</td>
                            <td><?= $siswa['nis'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Kelas</strong></td>
                            <td>:</td>
                            <td><?= $siswa['id_kelas'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jurusan</strong></td>
                            <td>:</td>
                            <td><?= $siswa['id_jurusan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Biaya SPP</strong></td>
                            <td>:</td>
                            <td>Rp. <?= number_format($siswa['jumlah'], 0, ',', '.') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header text-primary ">
                    <strong>Tagihan SPP</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>No Bayar</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Biaya SPP</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($tagihan) && count($tagihan) > 0): ?>
                                    <?php foreach ($tagihan as $key => $row): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['bulan'] ?></td>
                                            <td><?= $row['nobayar'] ?? '-' ?></td>
                                            <td><?= $row['tglbayar'] ?? '-' ?></td>
                                            <td>Rp. <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                                            <td><?= $row['ket'] ?></td>
                                            <td class="text-center">
                                                <?php if ($row['ket'] === 'belum lunas'): ?>
                                                    <form action="<?= base_url('/transaksi/bayar') ?>" method="post" class="d-inline">
                                                        <input type="hidden" name="id_spp" value="<?= $row['id_spp'] ?>">
                                                        <input type="hidden" name="nis" value="<?= $siswa['nis'] ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm">Bayar</button>
                                                    </form>
                                                <?php else: ?>
                                                    <form action="<?= base_url('/transaksi/batal') ?>" method="post" class="d-inline">
                                                        <input type="hidden" name="id_spp" value="<?= $row['id_spp'] ?>">
                                                        <input type="hidden" name="nis" value="<?= $siswa['nis'] ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">Batal</button>
                                                    </form>
                                                    <button class="btn btn-success btn-sm" onclick="window.print()">Cetak</button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada tagihan untuk siswa ini.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php elseif (isset($error)): ?>
            <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> <?= $error ?></div>
        <?php else: ?>
            <!-- Tampilan awal -->
            <!-- <p class="text-center">Silakan masukkan NIS untuk mencari data siswa*</p> -->
        <?php endif; ?>
    </div>
</div>

<?= view('layout/footer') ?>