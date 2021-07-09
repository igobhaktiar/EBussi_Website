<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Alert;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $produk = Produk::get();
        return view('backend.dashboard',[
            'produk' => $produk,
        ]);
        return view('backend.dashboard');
    }
}
