<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
Use Alert;

class KategoriProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        $kategori_produks = KategoriProduk::simplePaginate(10);
        
        return view('backend.kategori_produk.index', compact('kategori_produks'));
    }

    public function delete($id){
        $kategori_produks = KategoriProduk::where('id', $id)->first();
        $kategori_produks->delete();
        return redirect('kategori-index')->with('success', 'Data Kategori Produk berhasil dihapus');
    }

    public function tambah_kat(){
        $kategori_produks = null;
        return view('backend.kategori_produk.create', compact('kategori_produks'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_kategori' => 'required|string|max:30|unique:kategori_produks',        
        ]);
        KategoriProduk::create($request->all());
        alert()->success('Data Kategori Produk berhasil disimpan', 'Success');
        return redirect('kategori-index');
    }

}
