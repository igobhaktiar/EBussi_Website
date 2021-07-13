<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
     // relasi saat ini buat tampilan katalog, SEMENTARA.
    public function pesanan_detail(){
        return $this->hasMany('App\Models\PesananDetail','produk_id', 'id');
    }

    public function kategori(){
        // kategori itu berada di tabel produk yang di buat foreignkey
        return $this->belongsTo('App\Models\KategoriProduk','kategori', 'id');
    }
    
    protected $table = 'produks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_produk', 'kategori', 'stok', 'beratisi_produk', 'harga_produk', 'foto_produk', 'keterangan'
    ];
}
