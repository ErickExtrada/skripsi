<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Dynamicdependent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pengiriman;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\suratjalan;
use App\Http\Controllers\suratjalanController;
use App\Http\Controllers\TruckController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get(
        '/pengelola-gudang',
        [AdminController::class, 'pengelolaGudang']
    )->middleware('aksesuser:pengelola_gudang');
    Route::get('logout', [AuthController::class, 'logout']);
});
//Create Data pada halaman pengelola gudang
Route::resource('/pengelolainput', DataController::class);
Route::get('/createData', [DataController::class, 'create']);

/**
 * This admin
 */
Route::resource('/admin-barang', BarangController::class);
Route::resource('/admin-pengiriman', PengirimanController::class);

//Create Truck data pada halaman admin
Route::resource('/admintruck', TruckController::class);
Route::get('/createTruck', [TruckController::class, 'create']);

//Create Pengiriman pada halaman admin
// Route::resource('/adminpengiriman', Pengiriman::class);
// Route::get('/createPengiriman',[Pengiriman::class, 'create']);

//Surat Jalan pada halaman admin
Route::get('/surat-jalan', [SuratJalanController::class, 'index']);

// Route::get('/count-items/{kode}', [BarangController::class, 'countItemsByCategory']);
// Route::get('/nama-barang/{kodeKategori}', [BarangController::class, 'getByKategori']);
Route::get('/products/{kode_barang}', [BarangController::class, 'getProductsByCategory']);
Route::get('/price/{id_barang}', [BarangController::class, 'getPriceById']);

// Route::get('/',[BarangController::class,'index']);
// Route::get('/barang/{kode_barang}', 'BarangController@getBarangByKategori');

Route::resource('/pengelolagudang', AuthController::class);
