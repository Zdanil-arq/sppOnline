<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to(base_url('dashboard'));
        }
        return view('auth/login');
    }

    public function login()
    {
        $data = $this->request->getPost(['nis', 'userpassword']);

        if (!$this->validateData($data, [
            'nis' => 'required',
            'userpassword' => 'required'
        ])) {
            return $this->index();
        }

        $nis = $this->request->getPost('nis');
        $userpassword = $this->request->getPost('userpassword');

        $user = $this->model->where('nis', $nis)->first();

        if (!$user || !password_verify($userpassword, $user['userpassword'])) {
            session()->setFlashdata('error', 'NIS atau password salah.');
            return redirect()->back();
        }

        $userData = [
            'id_user'   => $user['id_user'],
            'username'  => $user['username'],
            'nis'       => $user['nis'],
            'role'      => $user['role'], // Simpan role ke session
            'logged_in' => true
        ];

        session()->set($userData);

        // Redirect berdasarkan role
        if ($user['role'] === 'admin') {
            return redirect()->to(base_url('dashboard'));
        } else {
            return redirect()->to(base_url('dashboard'));
        }
    }

    private function isLoggedIn(): bool
    {
        return session()->get('logged_in') ?? false;
    }
}
