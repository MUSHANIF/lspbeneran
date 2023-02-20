<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboardController;
use App\Models\jnslayanan;
use App\Models\kursi;
use App\Models\layanan;
use App\Models\gallery;
use App\Http\Controllers\jnslayananController;
use App\Http\Controllers\layananController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\kursiController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $datas = jnslayanan::all();
    $user = Auth::id();    
    $data = layanan::with(['layanan','carts','kurs'])
    ->where('status', 1)->get();
    return view('welcome',compact('datas','data','user'));
});
Route::get('/detail/{id}', function ($id) {
    $user = Auth::id();         
    $tambah = layanan::with(['layanan','carts'])
    ->where('id', $id)
    ->where('status', 1)->get();
    $data = layanan::with(['layanan','carts','gallery'])
    ->join('galleries', 'galleries.layananid', '=', 'layanans.id')
    ->where('layanans.status', 1) ->whereRelation('gallery', 'layananid' ,$id) ->get();
    $datas = layanan::with(['layanan','carts','gallery','kurs'])
    ->join('galleries', 'galleries.layananid', '=', 'layanans.id')
    ->whereRelation('gallery', 'layananid' ,$id)->groupBy('layananid')->get();    
    return view('detail',compact('data','user','datas','tambah'));
})->name('detail');
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware('admin')->group(function () {
        Route::resource('jns', jnslayananController::class);
        Route::get('/dashboardAdmin', [dashboardController::class, 'index'])->name('dashboardAdmin');
        Route::resource('layanan', layananController::class);
        Route::resource('kursi', kursiController::class);
        Route::get('/laporan', [laporanController::class, 'index'])->name('laporan');
        Route::get('/laporanexcel', [laporanController::class, 'excel']);
        Route::get('/laporanpdf', [laporanController::class, 'pdf']);
        Route::resource('detailgambar', GalleryController::class);               
    });
    Route::middleware('user')->group(function () {
        Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
        Route::get('/berhasil/{id}', [App\Http\Controllers\TransaksiController::class, 'berhasil'])->name('berhasil');
        Route::get('/keranjang/{id}', [App\Http\Controllers\TransaksiController::class, 'keranjang'])->name('keranjang');
        Route::post('/validation', [App\Http\Controllers\profileController::class, 'validasi'])->name('validation');
        Route::post('/tambah/{id}', [App\Http\Controllers\TransaksiController::class, 'tambah'])->name('tambah');
        Route::get('/pembayaran/{id}', [App\Http\Controllers\TransaksiController::class, 'pembayaran'])->name('pembayaran');
        Route::get('/bukti/{id}', [App\Http\Controllers\TransaksiController::class, 'bukti'])->name('bukti');
        Route::post('/bayar/{id}', [App\Http\Controllers\TransaksiController::class, 'bayar'])->name('bayar');
        Route::delete('/hapus/{id}', [App\Http\Controllers\TransaksiController::class, 'hapus'])->name('hapus');
    });
    Route::middleware('superadmin')->group(function () {
        Route::get('/dashboardsuperadmin', [dashboardController::class, 'index'])->name('dashboardsuperadmin');
        Route::resource('dataadmin', adminController::class);
        Route::get('/datauser', [App\Http\Controllers\userController::class, 'data'])->name('datauser');
        Route::delete('/hapususer/{id}', [App\Http\Controllers\userController::class, 'delete'])->name('hapususer');
    });
});
require __DIR__.'/auth.php';

