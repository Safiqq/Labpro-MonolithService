<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KatalogController extends Controller
{
    public function show()
    {
        $response = Http::get('http://localhost:3002/barang');
        $barangs = $response->json()["data"];

        return view('katalog', compact('barangs'));
    }
}