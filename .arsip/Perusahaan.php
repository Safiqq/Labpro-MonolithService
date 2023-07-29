<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_telp',
        'kode',
    ];
}