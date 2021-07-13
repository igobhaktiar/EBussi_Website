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

    public function pesan(Request $request, $id){
        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();
        
        //validasi apakah melebihi stok
        //ini sudah berfungsi
        //tpi kalau untuk misalnya di keranjang udh ada 7 tpi pas di tmbh lagi 4 itu ga bisa woy
        // masihh ke save. keadaan stoknya 10. kalau bingung, coba jalani aja.
        if($request->jumlah_pesan >= $produk->stok){
            alert()->warning('Jumlah produk melebihi stok, periksa keranjang anda', 'Warning');
            return redirect('pesan/'.$id);
        }

        //cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        //simpan ke database pesanan
        if(empty($cek_pesanan)){
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id ;
            $pesanan->tanggal_pesanan = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
            
        }
        
        //simpan ke database pesanan detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //cek pesananan detail
        $cek_pesanan_detail = PesananDetail::where("produk_id", $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();

        if(empty($cek_pesanan_detail)){
            $pesanan_detail = new PesananDetail;
            $pesanan_detail-> produk_id = $produk->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $produk->harga_produk*$request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = PesananDetail::where("produk_id", $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

            //Harga sekarang
            $harga_pesanan_detail_baru = $produk->harga_produk*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }
       
        //jumlah total 
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$produk->harga_produk*$request->jumlah_pesan;
        $pesanan->update();

        alert()->success('Pesanan Sukses Masuk Keranjang', 'Success');
        return redirect('check-out');
    }
}
