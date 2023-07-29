# Monolith-Service API
Nama: Syafiq Ziyadul Arifin

NIM: 18221048

## How to Use
1. `npm i`
2. `php artisan serve`

Additional:
* `npm run watch` (in different terminal) for hot-reloading

## Design Patterns
1. Model-View-Controller (MVC)
    
    Design pattern MVC digunakan dalam struktur proyek ini, dengan direktori Http\Controllers berisi berbagai pengontrol (controllers) yang bertanggung jawab untuk menerima permintaan dari pengguna (View) dan memprosesnya dengan menggunakan model (Models) sebelum memberikan respon kembali ke pengguna.
2. Middleware

    Design pattern Middleware digunakan di dalam direktori Http\Middleware. Middleware digunakan untuk menambahkan lapisan fungsionalitas tambahan yang berlaku sebelum atau sesudah permintaan diproses oleh controller. 
3. Service Provider

    Design pattern Service Provider digunakan dalam direktori Providers. Service provider menyediakan fungsi untuk mendaftarkan berbagai layanan (services) dalam aplikasi. Service provider membantu dalam mengatur berbagai konfigurasi, koneksi, dan dependency injection.
4. Component-Based

    Design pattern berbasis komponen digunakan dalam direktori View\Components. Komponen seperti ErrorModal dan SuccessModal digunakan untuk membuat komponen yang dapat digunakan kembali dan menyusun tampilan secara modular.

## Tech Stacks
1. Laravel v8
2. Laravel Mix
3. JavaScript
4. Composer
5. Webpack
6. PostgreSQL

## Endpoints
* **POST**
    * **/register**: Menangani proses registrasi dan membuat akun pengguna baru.
    * **/login**: Menangani proses login dan melakukan autentikasi pengguna.
    * **/beli**: Menangani proses pembelian dan mencatat transaksi.
* **GET**
    * **/**: Menampilkan halaman utama dengan daftar rute yang tersedia.
    * **/register**: Menampilkan formulir registrasi untuk pengguna baru.
    * **/login**: Menampilkan formulir login untuk pengguna yang sudah terdaftar.
    * **/katalog**: Menampilkan katalog barang.
    * **/detail/:id**: Menampilkan detail dari barang tertentu berdasarkan ID-nya.
    * **/beli/:id**: Menampilkan halaman pembelian untuk barang tertentu 
    * **/riwayat**: Menampilkan riwayat transaksi untuk pengguna yang sudah terautentikasi.