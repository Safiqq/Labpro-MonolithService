<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nama',
        'username',
        'email',
        'password',
        'tipe',
    ];

    protected $hidden = [
        'password',
    ];
}