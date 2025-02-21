<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class DataSiswaController extends BaseController
{
    //datasiswa index function
    public function index()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }
        $siswa = new SiswaModel();
        $data = [
            'title' => 'Data Siswa | Pembayaran SPP Sekolah',
            'siswa' => $siswa->findAll()
        ];

        return view('datasiswa/index', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }

    //datasisw create function
    public function create()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }
        if (session()->role != 'admin'){
            return redirect()->to('datasiswa');
        }
        $data = [
            'title' => 'Tambah Data Siswa',
        ];
        return view('datasiswa/create', $data);
    }

    //datasiswa store function
    public function store()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }
        // Load helper form dan URL
        helper(['form', 'url']);

        $siswa = new SiswaModel();

        // Ambil data dari input form
        $dataSiswa = [
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_jurusan' => $this->request->getPost('id_jurusan'),
        ];

        // Hitung jumlah (biaya SPP) berdasarkan kelas
        $dataSiswa['jumlah'] = $this->getBiayaSPP($dataSiswa['id_kelas']);

        // Simpan data siswa
        $siswa->insert($dataSiswa);

        return redirect('datasiswa')->with('status', 'Data berhasil ditambahkan');
    }

    // Fungsi untuk menghitung biaya SPP berdasarkan kelas
    private function getBiayaSPP($idKelas)
    {
        $biaya = [
            'X' => 275000,
            'XI' => 300000,
            'XII' => 325000,
        ];

        return $biaya[$idKelas] ?? 0;
    }



    //datasiswa edit function
    public function edit($id_siswa)
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }
        if (session()->role != 'admin'){
            return redirect()->to('datasiswa');
        }
        //model initialize
        $siswa = new SiswaModel();

        $data = [
            'siswa' => $siswa->find($id_siswa)
        ];

        return view('datasiswa/edit', $data);
    }

    //datasiswa update function
    public function update($id_siswa)
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }
        // Load helper form and URL
        helper(['form', 'url']);

        $siswa = new SiswaModel();

        // Ambil data dari input form
        $dataSiswa = [
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_jurusan' => $this->request->getPost('id_jurusan'),
        ];

        // Tambahkan jumlah berdasarkan id_kelas
        $dataSiswa['jumlah'] = $this->getBiayaSPP($dataSiswa['id_kelas']);

        // Update data siswa di database
        $siswa->update($id_siswa, $dataSiswa);

        return redirect('datasiswa')->with('status', 'Data berhasil diperbarui');
    }

    //delete function
    public function delete($id_siswa)
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }
        if (session()->role != 'admin'){
            return redirect()->to('datasiswa');
        }
        //model initialize
        $siswa = new SiswaModel();

        $data = $siswa->find($id_siswa);

        if ($data) {
            $siswa->delete($id_siswa);

            return redirect('datasiswa')->with('status', 'Data Berhasil Dihapus');
        }
    }
}
