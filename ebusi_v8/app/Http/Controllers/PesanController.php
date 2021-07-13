<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\User;
use Auth;
use Alert;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $produk = Produk::where('id', $id)->first();
        return view('pesan.index', compact('produk'));
    }
}
