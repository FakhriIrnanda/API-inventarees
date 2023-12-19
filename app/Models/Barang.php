<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_kategori',
        'nama_barang',
        'Jumlah_barang',
        'kondisi',
        'keterangan',
        'spesifikasi',
        'tanggal'
    ];
}
