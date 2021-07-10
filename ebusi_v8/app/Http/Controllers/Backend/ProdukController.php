<?php

namespace App\Http\Controllers\Backend;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() {
        $produks = Produk::get();
        return view('backend.produk.index', compact('produks'));
        }
}
