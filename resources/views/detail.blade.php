<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Nunito', sans-serif;
    }
    </style>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Detail Barang</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">{{ $barang['nama'] }}</h2>
            <p class="text-gray-600 mb-2">ID: {{ $barang['id'] }}</p>
            <p class="text-gray-600 mb-2">Harga: Rp{{ number_format($barang['harga'], 0, ',', '.') }}</p>
            <p class="text-gray-600 mb-2">Stok: {{ $barang['stok'] }}</p>
            <p class="text-gray-600 mb-2">Kode: {{ $barang['kode'] }}</p>
            <p class="text-gray-600 mb-4">Perusahaan: {{ $barang['perusahaan_id'] }}</p>
            <button type="button" onclick="beliBarang()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Beli Barang</button>
        </div>
        <a href="{{ route('katalog') }}" class="text-blue-600 font-semibold hover:underline mt-4 block">Kembali ke Katalog</a>
    </div>

    <script>
        function beliBarang() {
            window.location.href = '/beli/' + '<?php echo $barang['id'] ?>'
        }
    </script>
</body>

</html>