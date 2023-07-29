<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Riwayat;
use App\Http\Controllers\JWTController;

class BeliController extends Controller
{
    private $key;
    private $jwtController;
    
    public function __construct()
    {
        $this->key = env('SECRET_TOKEN');
        $this->jwtController = new JWTController();
    }
    
    public function show($id)
    {
        $response = Http::get("http://localhost:3002/barang/{$id}");
        if ($response->status() === 200) {
            $barang = $response->json()["data"];
            return view('beli', ['barang' => $barang]);
        } else {
            abort($response->status(), 'Failed to fetch barang details.');
        }
    }
    
    public function beliBarang(Request $request) {
        $validator = Validator::make($request->all(), [
            'barang_id' => 'required|string',
            'nama_barang' => 'required|string',
            'jumlah_barang' => 'required|string',
            'total_harga' => 'required|string',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->input('barang_id');
        $response = Http::get("http://localhost:3002/barang/{$id}");
        if ($response->status() === 200) {
            $barang = $response->json()["data"];
            $response = Http::post('http://localhost:3002/login', [
                'username' => 'admin',
                'password' => 'admin',
            ]);
            if ($response->status() === 200) {
                $token = $response->json()["data"]["token"];
                $response = Http::withHeaders([
                    'Authorization' => $token,
                ])->put("http://localhost:3002/barang/{$id}", [
                    'nama' => $barang['nama'],
                    'harga' => $barang['harga'],
                    'stok' => $barang['stok'] - $request->input('jumlah_barang'),
                    'kode' => $barang['kode'],
                    'perusahaan_id' => $barang['perusahaan_id'],
                ]);
                if ($response->status() === 200) {
                    $riwayat = new Riwayat([
                        'id' => Str::uuid()->toString(),
                        'user_id' => $this->jwtController->getUserId($request, $this->key),
                        'barang_id' => $id,
                        'nama_barang' => $request->input('nama_barang'),
                        'jumlah_barang' => $request->input('jumlah_barang'),
                        'total_harga' => $request->input('total_harga'),
                    ]);
                    $riwayat->save();
                    
                    $successMessage = 'Berhasil membeli ' . $request->input('jumlah_barang') . ' ' . $barang['nama'] . '!';
                    return view('beli', compact('id', 'barang', 'successMessage'));
                } else {
                    abort($response->status(), 'Failed to update barang\'s stok.');
                }
            } else {
                abort($response->status(), 'Failed to login as admin.');
            }
        } else {
            abort($response->status(), 'Failed to fetch barang details.');
        }
        
        // return redirect()->route('getBeli', ['id' => $request->input('barang_id')]);
    }
}