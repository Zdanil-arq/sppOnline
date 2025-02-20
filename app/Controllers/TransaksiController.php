<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\PembayaranModel;

class TransaksiController extends BaseController
{
    //index function
    public function index()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Transaksi | Pembayaran SPP Sekolah'
        ];
        return view('transaksi/index', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }

    //serch funcition
    public function search()
    {
        // Ambil input NIS dari POST atau GET
        $nis = $this->request->getPost('nis') ?? $this->request->getGet('nis');
        $siswaModel = new SiswaModel();
        $pembayaranModel = new PembayaranModel();

        // Cari siswa berdasarkan NIS
        $siswa = $siswaModel->where('nis', $nis)->first();

        if ($siswa) {
            $bulan = [
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni'
            ];

            // Periksa setiap bulan, buat tagihan jika belum ada, atau update jika jumlahnya berbeda
            foreach ($bulan as $b) {
                $tagihan = $pembayaranModel
                    ->where('id_siswa', $siswa['id_siswa'])
                    ->where('bulan', $b)
                    ->first();

                if (!$tagihan) {
                    // Jika tagihan belum ada, buat tagihan baru
                    $pembayaranModel->insert([
                        'id_siswa' => $siswa['id_siswa'],
                        'bulan' => $b,
                        'jumlah' => $siswa['jumlah'],
                        'ket' => 'belum lunas',
                    ]);
                } elseif ($tagihan['jumlah'] != $siswa['jumlah']) {
                    // Jika jumlah tagihan tidak sesuai, perbarui jumlah tagihan
                    $pembayaranModel->update($tagihan['id_spp'], [
                        'jumlah' => $siswa['jumlah'],
                    ]);
                }
            }

            $tagihan = $pembayaranModel->where('id_siswa', $siswa['id_siswa'])->findAll();

            return view('transaksi/index', [
                'title' => 'Transaksi | Pembayaran SPP Sekolah',
                'siswa' => $siswa,
                'tagihan' => $tagihan,
            ]);
        } else {
            return view('transaksi/index', [
                'title' => 'Transaksi | Pembayaran SPP Sekolah',
                'error' => 'NIS tidak ditemukan.',
            ]);
        }
    }



    public function bayar()
    {
        $id_spp = $this->request->getPost('id_spp'); // Ambil id_siswa dari request
        $nis = $this->request->getPost('nis'); // Ambil NIS dari request
        $model = new PembayaranModel();

        // Periksa apakah ID SPP ada
        if (!$id_spp) {
            return redirect()->back();
        }

        // Periksa apakah NIS ada
        if (!$nis) {
            return redirect()->back();
        }

        // Ambil data pembayaran berdasarkan id_spp
        $pembayaran = $model->find($id_spp);

        if (!$pembayaran) {
            return redirect()->back();
        }

        $id_user = session()->get('nis');
        if (!$id_user) {
            return redirect()->to('/');
        }

        // Update data pembayaran 'Bayar'
        $updateData = [
            'nobayar' => rand(10000, 99999), // Nomor bukti pembayaran
            'tglbayar' => date('Y-m-d'),   // Tanggal pembayaran
            'ket' => 'lunas',             // Status pembayaran
            'id_admin' => $id_user,      // Simpan id_admin dari sesi
        ];

        $model->update($id_spp, $updateData);

        // Redirect kembali ke halaman transaksi dengan data NIS
        return redirect()->to('/transaksi/search?nis=' . $nis)
            ->with('success', 'Pembayaran berhasil dilakukan!');
    }



    public function batal()
    {
        $id_spp = $this->request->getPost('id_spp');
        $nis = $this->request->getPost('nis'); // Ambil NIS dari request
        $model = new PembayaranModel();

        // Periksa apakah ID SPP dan NIS ada
        if (!$id_spp || !$nis) {
            return redirect()->back();
        }

        // Reset data pembayaran 'Batal'
        $updateData = [
            'nobayar' => null,      // Hapus nomor bukti pembayaran
            'tglbayar' => null,     // Hapus tanggal pembayaran
            'ket' => 'belum lunas', // Ubah status menjadi "belum lunas"
            'id_admin' => null      // Ubah id admin menjadi 0
        ];

        if ($model->update($id_spp, $updateData)) {
            // Redirect kembali ke halaman transaksi dengan data NIS
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
