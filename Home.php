<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('v_home');
    }

    public function produk()
    {
        return view('v_produk');
    }

    public function keranjang()
    {
        return view('v_keranjang');
    }
}