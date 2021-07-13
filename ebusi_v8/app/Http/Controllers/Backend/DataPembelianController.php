<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PesananDetail;
use App\Models\Pesanan;
use App\Models\Produk;
use Alert;

class DataPembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
      
        // $pembelians = Pesanan::get();
        // $users = DB::table('users')
        //         ->join('pesanans', 'users.id', '=', 'pesanans.user_id')
        //         ->select('users.*')->get();
        // return view('backend.data_pembelian.index', compact('pembelians', 'users'));
        $data = DB::table('users')
                ->join('pesanans', 'pesanans.user_id', '=', 'users.id')
                ->simplePaginate(10);
        return view('backend.data_pembelian.index')->with('data', $data);
    }

    public function detail($id){


        $pesananDetail[] = [DB::table('pesanan_details')
            ->Join(
                'produks',
                'pesanan_details.produk_id',
                '=',
                'produks.id',)
                ->where('pesanan_details.pesanan_id', '=', $id)
            ->get()];
               
        $dataUser = DB::table('users')
                ->join('pesanans', 'pesanans.user_id', '=', 'users.id')
                ->where('pesanans.id', '=', $id)
                ->get();
    //    dd($pesananDetail);
        return view('backend.data_pembelian.detail',[
            'pesananDetail' => $pesananDetail,
            'dataUser' => $dataUser,
        ]);
    }
}
