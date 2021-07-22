<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
       public function store(Request $request){
           $validasi = Validator::make($request->all(),[
            'user_id' => 'required',
            'jumlah' => 'required',
            'jumlah_harga' => 'required'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }
        $status = 1;
        $tanggal = Carbon::now();

        $dataTransaksi = array_merge($request->all(), [
            'status' => $status,
            'tanggal_pesanan' => $tanggal
        ]);

        DB::beginTransaction();
        $pesanan = Pesanan::create($dataTransaksi);
        foreach ($request->produks as $produk){
            $detail = [
                'pesanan_id' => $pesanan->id,
                'produk_id' => $produk['id'],
                'jumlah' => $produk['jumlah'],
                'jumlah_harga' => $produk['jumlah_harga'],
            ];
            $updateproduk = Produk::find($produk['id']);
            $updateproduk->stok = $updateproduk->stok - $produk['jumlah'];
            $updateproduk->update();
            $transaksiDetail = PesananDetail::create($detail);
        }

        if (!empty($pesanan) && !empty($transaksiDetail)){
            DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi Berhasil',
                'transaksi' => collect($pesanan)
            ]);
        } else{
            DB::rollback();
            $this->error('Transaksi gagal');
        }



    }

    public function history($id) {
        $transaksis = Pesanan::with(['user'])->whereHas('user', function ($query) use ($id) {
            $query->whereId($id);
        })->orderBy("id", "desc")->get();

        foreach ($transaksis as $pesanan) {
            $pesanan_detail = $pesanan->pesanan_detail;
            foreach ($pesanan_detail as $detail) {
                $detail->produk;
            }
        }


        if (!empty($transaksis)){
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi Berhasil',
                'transaksis' => collect($transaksis)
            ]);
        } else{
            $this->error('Transaksi gagal');
        }
    }

    public function error($pesan){
        return response()->json([
            'success'=> 0,
            'message'=> $pesan
        ]);
    }


}
