<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\Detail_PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\Detail_PenjualanController;
use App\Http\Controllers\PengembalianController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('belumlogin');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'prosesLogin'])->name('proses.login');


Route::group(['middleware' => 'sudahlogin'], function () {
    
    Route::get('/dashboard', [App\Http\Controllers\LoginController::class, 'dashboard'])->name('dashboard');
    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    
    Route::get('pengguna/index', [PenggunaController::class, 'index']);
    Route::get('pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('pengguna/store', [PenggunaController::class, 'store']);
    Route::get('pengguna/edit/{id_pengguna}', [PenggunaController::class, 'edit']);
    Route::put('pengguna/update/{id_pengguna}', [PenggunaController::class, 'update']);
    Route::get('pengguna/delete/{id_pengguna}', [PenggunaController::class, 'destroy']);
    
    Route::get('kategori/index', [KategoriController::class, 'index']);
    Route::post('kategori/store', [KategoriController::class, 'store']);
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::get('kategori/edit/{id_kategori}', [KategoriController::class, 'edit']);
    Route::put('kategori/update/{id_kategori}', [KategoriController::class, 'update']);
    Route::get('kategori/delete/{id_kategori}', [KategoriController::class, 'destroy']);
    
    Route::get('satuan/index', [SatuanController::class, 'index']);
    Route::post('satuan/store', [SatuanController::class, 'store']);
    Route::get('satuan/create', [SatuanController::class, 'create'])->name('satuan.create');
    Route::get('satuan/edit/{id_satuan}', [SatuanController::class, 'edit']);
    Route::put('satuan/update/{id_satuan}', [SatuanController::class, 'update']);
    Route::get('satuan/delete/{id_satuan}', [SatuanController::class, 'destroy']);
    
    Route::get('pemasok/index', [PemasokController::class, 'index']);
    Route::post('pemasok/store', [PemasokController::class, 'store']);
    Route::get('pemasok/create', [PemasokController::class, 'create'])->name('pemasok.create');
    Route::get('pemasok/edit/{id_pemasok}', [PemasokController::class, 'edit']);
    Route::put('pemasok/update/{id_pemasok}', [PemasokController::class, 'update']);
    Route::get('pemasok/delete/{id_pemasok}', [PemasokController::class, 'destroy']);
    
    Route::get('pelanggan/index', [PelangganController::class, 'index']);
    Route::post('pelanggan/store', [PelangganController::class, 'store']);
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::get('pelanggan/edit/{id_pelanggan}', [PelangganController::class, 'edit']);
    Route::put('pelanggan/update/{id_pelanggan}', [PelangganController::class, 'update']);
    Route::get('pelanggan/delete/{id_pelanggan}', [PelangganController::class, 'destroy']);
    
    Route::get('barang/index', [BarangController::class, 'index']);
    Route::post('barang/store', [BarangController::class, 'store']);
    Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::get('barang/edit/{id}', [BarangController::class, 'edit']);
    Route::put('barang/update/{id}', [BarangController::class, 'update']);
    Route::get('barang/delete/{id}', [BarangController::class, 'destroy']);
    Route::get('barang/read/{id}', [BarangController::class, 'show']);
    
    Route::post('pembelian/store', [PembelianController::class, 'store']);
    Route::get('pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::get('pembelian/index', [PembelianController::class, 'index']);
    Route::get('pembelian/rinci/{id_pembelian}', [PembelianController::class, 'rinci']);
    Route::post('pembelian/pemasokAdd', [PembelianController::class, 'pemasokAdd']);
    Route::post('pembelian/detailAdd', [PembelianController::class, 'detailAdd']);
    Route::get('pembelian/delete/{id_pembelian}', [PembelianController::class, 'destroy']);
    Route::get('pembelian/edit/{id_pembelian}', [PembelianController::class, 'edit']);
    Route::put('pembelian/update/{id_pembelian}', [PembelianController::class, 'update']);
    
    Route::get('penjualan/index', [PenjualanController::class, 'index']);
    Route::get('penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('penjualan/pelangganAdd', [PenjualanController::class, 'pelangganAdd']);
    Route::get('penjualan/delete/{faktur}', [PenjualanController::class, 'destroy']);
    Route::post('penjualan/store', [PenjualanController::class, 'store']);
    Route::get('penjualan/rinci/{faktur}', [PenjualanController::class, 'rinci']);
    Route::post('penjualan/detailAdd', [PenjualanController::class, 'detailAdd']);
    Route::post('penjualan/uang/{faktur}', [PenjualanController::class, 'uang']);
    Route::get('penjualan/faktur/{faktur}', [PenjualanController::class, 'faktur']);
    Route::get('penjualan/cetak/{faktur}', [PenjualanController::class, 'cetak']);
    
    Route::get('detail_pembelian/delete/{id}', [Detail_PembelianController::class, 'destroy']);
    Route::get('detail_penjualan/delete/{id}', [Detail_PenjualanController::class, 'destroy']);
    
    Route::get('pengembalian/index', [PengembalianController::class, 'index']);
    Route::post('pengembalian/store', [PengembalianController::class, 'store']);
    Route::get('pengembalian/create', [PengembalianController::class, 'create'])->name('pengembalian.create');
    Route::get('pengembalian/edit/{id}', [PengembalianController::class, 'edit']);
    Route::put('pengembalian/update/{id}', [PengembalianController::class, 'update']);
    Route::get('pengembalian/delete/{id}', [PengembalianController::class, 'destroy']);
    Route::get('pengembalian/returAdd/{faktur}', [PengembalianController::class, 'returAdd']);
    Route::get('pengembalian/create', [PengembalianController::class, 'create']);

});

// // Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/tema/home', [App\Http\Controllers\HomeController::class, 'home']);

// // Route::middleware(['auth'])->group(function () {
// // 	Route::get('tema/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
 
// //     Route::middleware(['admin'])->group(function () {
// //         Route::get('admin', [AdminController::class, 'index']);
        
// //     });
 
// //     Route::middleware(['user'])->group(function () {
// //         Route::get('user', [UserController::class, 'index']);
        
// //     });

// //     Route::middleware(['pemilik'])->group(function () {
// //         Route::get('pemilik', [PemilikController::class, 'index']);
// //     });
 
// //     Route::get('/logout', function() {
// //         Auth::logout();
// //         redirect('/');
// //     });
// // });

// Auth::routes();
