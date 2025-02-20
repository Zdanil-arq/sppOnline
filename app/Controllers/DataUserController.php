<?php

namespace App\Controllers;

use App\Models\UserModel;


class DataUserController extends BaseController
{
    //index function
    public function index()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }

        $users = new UserModel();
        $data = [
            'title' => 'Data User | Pembayaran SPP Sekolah',
            'users' => $users->findAll()
        ];
        return view('datauser/index', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }

    //function create
    public function create()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Tambah data admin'
        ];
        return view('datauser/create', $data);
    }

    //function store
    public function store()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }

        // Load helper form and URL
        helper(['form', 'url']);

        // Define validation
        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Username'
                ]
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Masukkan Email.',
                    'valid_email' => 'Format Email tidak valid.',
                    'is_unique' => 'Email sudah digunakan.'
                ]
            ],
            'password' => [
                'rules'  => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Masukkan Password.',
                    'min_length' => 'Password minimal 8 karakter.'
                ]
            ],
        ]);

        if (!$validation) {
            // Render view with error validation message
            return view('datauser/create', [
                'title' => 'Tambah Data Admin',
                'validation' => $this->validator
            ]);
        } else {
            // Model initialize
            $userModel = new UserModel();

            // Insert data into database
            $userModel->insert([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ]);

            // Flash message
            session()->setFlashdata('message', 'Data Berhasil Disimpan');

            return redirect()->to(base_url('datauser'));
        }
    }

    //function edit
    public function edit($id_admin)
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/');
        }

        // Inisialisasi model
        $userModel = new UserModel();

        // Ambil data user berdasarkan ID
        $user = $userModel->find($id_admin);

        // Kirim data ke view   
        $data = [
            'title' => 'Edit Data Admin',
            'user' => $user
        ];

        return view('datauser/edit', $data);
    }

    //function update
    public function update($id_admin)
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/');
        }

        // Define validation
        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Username'
                ]
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Masukkan Email.',
                    'valid_email' => 'Format Email tidak valid.',
                    'is_unique' => 'Email sudah digunakan.'
                ]
            ],
            'password' => [
                'rules'  => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Masukkan Password.',
                    'min_length' => 'Password minimal 8 karakter.'
                ]
            ],
        ]);

        if (!$validation) {

            //model initialize
            $userModel = new UserModel();

            //render view with error validation message
            return view('datauser/edit', [
                'title' => 'Edit Data Admin',
                'user' => $userModel->find($id_admin),
                'validation' => $this->validator
            ]);
        } else {

            //model initialize
            $userModel = new UserModel();

            //insert data into database
            $userModel->update($id_admin, [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Diupdate');

            return redirect()->to(base_url('datauser'));
        }
    }

    //function delete
    public function delete($id_admin){
        //model initialize
        $userModel = new UserModel();

        $user = $userModel->find($id_admin);

        if ($user) {
            $userModel->delete($id_admin);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('datauser'));
        }

    }
    
}
