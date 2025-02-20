<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_spp';
    protected $allowedFields = ['id_siswa', 'bulan', 'nobayar', 'tglbayar', 'jumlah', 'ket', 'id_admin'];
}

?>
