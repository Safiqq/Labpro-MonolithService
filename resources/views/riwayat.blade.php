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
        <h1 class="text-3xl font-bold mb-4">Riwayat</h1>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            @if ($riwayats->count() > 0)
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nama Barang</th>
                            <th class="px-4 py-2">Jumlah Barang</th>
                            <th class="px-4 py-2">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayats as $riwayat)
                            <tr>
                                <td class="border px-4 py-2">{{ $riwayat['nama_barang'] }}</td>
                                <td class="border px-4 py-2">{{ $riwayat['jumlah_barang'] }}</td>
                                <td class="border px-4 py-2">Rp{{ number_format($riwayat['total_harga'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Belum ada riwayat pembelian yang tersedia.</p>
            @endif
        </div>
    </div>
</body>

</html>