<?php

namespace App\Http\Controllers\Backend;
use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data = DB::table('kategori_produks')
        ->join('produks', 'produks.kategori', '=', 'kategori_produks.id')
        ->simplePaginate(10);
        return view('backend.produk.index')->with('data', $data);
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

        //Edit
        public function edit($id){
            $kategori = KategoriProduk::all();
            $produks = Produk::find($id);
            return view('backend.produk.edit', compact('produks'));
            // $produks = Produk::where('id', $id)->first();
            // return view('backend.produk.create', compact('produks'));
        }
    
        public function update(Request $request, $id){
    
            $request->validate([
                'nama_produk' => 'required|string|max:30',
                'stok' => 'required',
                'beratisi_produk' => 'required',
                'harga_produk' => 'required',
                'foto_produk' => 'image',
                'keterangan' => 'required|string',          
            ]);
    
            $param = $request->all();
            $data = [
                'nama_produk' => $param['nama_produk'],
                'kategori'  => $param['kategori'],
                'stok' => $param['stok'],
                'beratisi_produk' => $param['beratisi_produk'],
                'harga_produk' => $param['harga_produk'],
                'keterangan' => $param['keterangan'],
            ];
    
    
            $foto_produk = $request->file('foto_produk');
    
            // kalau pas ada edit foto, laksanakan
            // yok bisa yok
    
            if($foto_produk){
            $imgName = $request->foto_produk->getClientOriginalName() . '-' . time() 
                . '.' .   $request->foto_produk->extension();
                $data['foto_produk'] = $imgName;
                
            $request->foto_produk->move(public_path('uploads'), $imgName);
            }
    
            try{
                $produk = Produk::where('id', $id)->first();
                $produk->update($data);
                alert()->success('Data Produk berhasil diubah', 'Success');
                return redirect('index-read');
            } catch (\Exception $e){
                alert()->success('Data Produk gagal diubah', 'Error');
                return redirect('index-read');
            }
            
            // return redirect('index-read')->with('success', 'Data Produk berhasil diubah');
            
            // $produks->update($request->all());
            // 
        }
        // hapus
    public function delete($id){
        // return "delete";
        $produk = Produk::where('id', $id)->first();
        $produk->delete();
        alert()->success('Data Produk berhasil dihapus', 'Success');
        return redirect('index-read');
        // return redirect('index-read')->with('success', 'Data Produk berhasil dihapus');
    }

    public function cetak(){
        $data_cetak = DB::table('kategori_produks')
        ->join('produks', 'produks.kategori', '=', 'kategori_produks.id')
        ->get();
        return view('backend.produk.cetak_produk')->with('data_cetak', $data_cetak);
    }
}
