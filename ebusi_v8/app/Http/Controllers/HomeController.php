<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //data barang yang akan ditampilkan dalam 1 halaman yakni ada 20 barang
        //dengan menggunakan script (paginate)
        $produks = Produk::paginate(20);
        // untuk liat kasarannya
        //  dd($produks); 
        return view('welcome', compact('produks'));
        
        //compact digunkan untuk mengoper $produks ke view
    }
}
