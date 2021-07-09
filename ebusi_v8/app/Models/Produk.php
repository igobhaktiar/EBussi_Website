<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_produk', 'kategori', 'stok', 'beratisi_produk', 'harga_produk', 'foto_produk', 'keterangan'
    ];
}
