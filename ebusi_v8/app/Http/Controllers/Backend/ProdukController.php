<?php

namespace App\Http\Controllers\Backend;
use App\Models\Produk;
use App\Models\KategoriProduk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    $produks = Produk::get();
    return view('backend.produk.index', compact('produks'));
    }

    public function create(){
    $kategori = KategoriProduk::all();
    $produks = null;
    return view('backend.produk.create', compact('kategori'));
    }

        public function store(Request $request){
            $input = $request->all();
            $request->validate([
                'nama_produk' => 'required|string|max:30',
                'stok' => 'required',
                'beratisi_produk' => 'required',
                'harga_produk' => 'required',
                'foto_produk' => 'required|image',
                'keterangan' => 'required|string',          
            ]);
            
            $imgName = $request->foto_produk->getClientOriginalName() . '-' . time() 
                                   . '.' .   $request->foto_produk->extension();
                                   
            $request->foto_produk->move(public_path('uploads'), $imgName);
    
            Produk::create([
                'nama_produk' => $request->nama_produk,
                'kategori' => $request->kategori,
                'stok' => $request->stok,
                'beratisi_produk' => $request->beratisi_produk,
                'harga_produk' => $request->harga_produk,
                'foto_produk' => $imgName,
                'keterangan' => $request->keterangan            
            ]);
            alert()->success('Data Produk berhasil disimpan', 'Success');
            return redirect('index-read');
            
                          
        }
}
