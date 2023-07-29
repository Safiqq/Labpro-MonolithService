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
    <x-success-modal :message="$successMessage ?? ''" />
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Beli Barang</h1>
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">{{ $barang['nama'] }}</h2>
            <p class="text-gray-600 mb-2">ID: {{ $barang['id'] }}</p>
            <p class="text-gray-600 mb-2">Harga: Rp{{ number_format($barang['harga'], 0, ',', '.') }}</p>
            <p class="text-gray-600 mb-2">Stok: {{ $barang['stok'] }}</p>
            <form action="{{ route('postBeli') }}" method="POST">
                <div class="mb-4">
                    <label for="jumlah_barang" class="text-gray-600 mb-2">Jumlah barang yang ingin dibeli:</label>
                    <input type="number" name="jumlah_barang" id="jumlah_barang" class="mt-1 p-2 border rounded-md w-full" min="1" max="{{ $barang['stok'] }}" required>
                </div>
                <input type="hidden" name="barang_id" value="{{ $barang['id'] }}">
                <input type="hidden" name="nama_barang" value="{{ $barang['nama'] }}">
                <input id="total_harga_" type="hidden" name="total_harga" value="{{ 0 }}">
                <div class="mb-4">
                    <label class="text-gray-600 mb-2">Total harga:</label>
                    <p id="total_harga" class="mt-1 p-2 border rounded-md bg-gray-100">Rp0</p>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 focus:outline-none focus:ring">Beli</button>
            </form>
        </div>
        <a href="{{ route('detail', ['id' => $barang['id']]) }}" class="text-blue-600 font-semibold hover:underline mt-4 block">Kembali ke Detail</a>
    </div>

    <script>
        function closeModal() {
            var modal = document.querySelector('.modal');
            modal.style.display = 'none';
            window.location.href = '/beli/' + '<?php echo $barang['id'] ?>'
        }

        const jumlahBarangInput = document.getElementById('jumlah_barang');
        const totalHarga = document.getElementById('total_harga');
        const hargaBarang = {{ $barang['harga'] }};

        jumlahBarangInput.addEventListener('input', function() {
            const jumlahBarang = parseInt(jumlahBarangInput.value);
            
            const formattedHarga = (hargaBarang * jumlahBarang).toLocaleString().replaceAll(',', '.');
            totalHarga.textContent = `Rp${!isNaN(jumlahBarang) ? formattedHarga : '0'}`;
            
            const totalHargaInput = document.getElementById('total_harga_');
            totalHargaInput.value = !isNaN(jumlahBarang) ? (hargaBarang * jumlahBarang) : 0;
        });
    </script>
</body>

</html>