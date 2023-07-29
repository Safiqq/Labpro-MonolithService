<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Register */
Route::get('/register', fn() => view('register'))->name('getRegister');

Route::post('/register', 'App\Http\Controllers\RegisterController@registerUser')->name('postRegister');


/* Login */
Route::get('/login', fn() => view('login'))->name('getLogin');

Route::post('/login', 'App\Http\Controllers\LoginController@loginUser')->name('postLogin');

Route::group(['middleware' => 'jwt_auth'], function () {
    /* Home */
    Route::get('/', function() {
        $routes = collect(Route::getRoutes())->filter(function ($route) {
            return !str_contains($route->uri(), '_ignition') && $route->getName() && in_array('GET', $route->methods());
        });
    
        return view('home', compact('routes'));
    });

    
    /* Katalog */
    Route::get('/katalog', 'App\Http\Controllers\KatalogController@show')->name('katalog');
    
    
    /* Detail */
    Route::get('/detail/{id}', 'App\Http\Controllers\DetailController@show')->name('detail');
    
    
    /* Beli */
    Route::get('/beli/{id}', 'App\Http\Controllers\BeliController@show')->name('getBeli');
    
    Route::post('/beli', 'App\Http\Controllers\BeliController@beliBarang')->name('postBeli');
    
    
    /* Riwayat */
    Route::get('/riwayat', 'App\Http\Controllers\RiwayatController@show')->name('riwayat');
});