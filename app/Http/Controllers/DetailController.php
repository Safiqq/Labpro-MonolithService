<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetailController extends Controller
{
    public function show($id)
    {
        $response = Http::get("http://localhost:3002/barang/{$id}");
        if ($response->status() === 200) {
            $barang = $response->json()["data"];
            return view('detail', ['barang' => $barang]);
        } else {
            abort($response->status(), 'Failed to fetch barang details.');
        }
    }
}