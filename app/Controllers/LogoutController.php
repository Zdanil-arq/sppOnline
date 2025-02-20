<?php namespace App\Controllers;

class LogoutController extends BaseController
{
    public function index()
    {
        session()->destroy(); // Menghapus semua session

        return redirect()->to(base_url('/'));
    }
}
