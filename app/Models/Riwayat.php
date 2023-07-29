<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'user_id',
        'barang_id',
        'nama_barang',
        'jumlah_barang',
        'total_harga',
    ];
}