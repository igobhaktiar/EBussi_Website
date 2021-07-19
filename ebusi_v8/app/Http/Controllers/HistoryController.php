<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Alert;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('history.index', compact('pesanans'));
    }

    public function detail($id){
        // $user = User::where('id', Auth::user()->id)->first();
        // $pesanan = Pesanan::where('id', $id)->first();
        // $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        
        // return view('history.detail', compact('pesanan','pesanan_details'));
        
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
        return view('history.detail',[
            'pesananDetail' => $pesananDetail,
            'dataUser' => $dataUser,
        ]);
    }

}
