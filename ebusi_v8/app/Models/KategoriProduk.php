<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    public function produk(){
        return $this->hasMany('App\Models\Produk','kategori', 'id');
    }

    protected $table = 'kategori_produks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kategori'
    ];

}
