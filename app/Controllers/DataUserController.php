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
        if (session()->role != 'admin'){
            return redirect()->to('dashboard');
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
        if (session()->role != 'admin'){
            return redirect()->to('dashboard');
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
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Username'
                ]
            ],
            'nis' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan nis.',
                    'is_unique' => 'Nis sudah digunakkan.',
                ]
            ],
            'role' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan role.',
                ]
            ],
            'userpassword' => [
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
                'username' => $this->request->getPost('username'),
                'nis' => $this->request->getPost('nis'),
                'role' => $this->request->getPost('role'),
                'userpassword' => $this->request->getPost('userpassword')
            ]);

            // Flash message
            session()->setFlashdata('message', 'Data Berhasil Disimpan');

            return redirect()->to(base_url('datauser'));
        }
    }

    //function edit
    public function edit($id_user)
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/');
        }
        if (session()->role != 'admin'){
            return redirect()->to('dashboard');
        }

        // Inisialisasi model
        $userModel = new UserModel();

        // Ambil data user berdasarkan ID
        $user = $userModel->find($id_user);

        // Kirim data ke view   
        $data = [
            'title' => 'Edit Data Admin',
            'user' => $user
        ];

        return view('datauser/edit', $data);
    }

    //function update
    public function update($id_user)
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/');
        }

        // Define validation
        $validation = $this->validate([
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Username'
                ]
            ],
            'nis' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan nis.',
                    'is_unique' => 'Nis sudah digunakkan.',
                ]
            ],
            'role' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan role.',
                ]
            ],
            'userpassword' => [
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
                'user' => $userModel->find($id_user),
                'validation' => $this->validator
            ]);
        } else {

            //model initialize
            $userModel = new UserModel();

            //insert data into database
            $userModel->update($id_user, [
                'username' => $this->request->getPost('username'),
                'nis' => $this->request->getPost('nis'),
                'role' => $this->request->getPost('role'),
                'userpassword' => $this->request->getPost('userpassword')
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Diupdate');

            return redirect()->to(base_url('datauser'));
        }
    }

    //function delete
    public function delete($id_user){
        if (!$this->isLoggedIn()) {
            return redirect()->to('/');
        }
        if (session()->role != 'admin'){
            return redirect()->to('dashboard');
        }
        //model initialize
        $userModel = new UserModel();

        $user = $userModel->find($id_user);

        if ($user) {
            $userModel->delete($id_user);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('datauser'));
        }

    }
    
}
