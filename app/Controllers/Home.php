<?php

namespace App\Controllers;

class Home extends BaseController
{
    //index function
    public function index()
    {
        // return view('welcome_message');
        return view('home');
    }

    public function coba()
    {
        return view('kamera');
    }
}
