<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\Pesanan;
use Alert;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $produk = Produk::get();
        $pesanan = Pesanan::get();
        $pengguna = User::get();
        return view('backend.dashboard',[
            'produk' => $produk,
            'pesanan' => $pesanan,
            'pengguna' => $pengguna,
        ]);
        return view('backend.dashboard');
    }
}
