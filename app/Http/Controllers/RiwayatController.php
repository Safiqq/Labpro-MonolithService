<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Riwayat;
use App\Http\Controllers\JWTController;

class RiwayatController extends Controller
{
    private $key;
    private $jwtController;
    
    public function __construct()
    {
        $this->key = env('SECRET_TOKEN');
        $this->jwtController = new JWTController();
    }
    
    public function show(Request $request)
    {
        $response = Http::get('http://localhost:3002/barang');
        $barangs = $response->json()["data"];

        $id = $this->jwtController->getUserId($request, $this->key);
        $riwayats = Riwayat::where('user_id', $id)->get();

        return view('riwayat', compact('barangs', 'riwayats'));
    }
}