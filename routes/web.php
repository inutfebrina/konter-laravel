<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransController;

Route::group(['middleware' => 'guest:login'],function(){
    Route::get('/',[LoginController::class, 'index'])->name('login') ;
    Route::get('login',[LoginController::class, 'index'])->name('login') ;
    Route::get('register',[LoginController::class, 'register'])->name('register') ;
    Route::post('daftar',[LoginController::class, 'daftar'])->name('daftar') ;
    Route::post('aksi-login',[LoginController::class, 'aksilogin'])->name('aksi-login') ;
    
});

Route::group(['middleware' => ['web','auth:login']],function(){
    Route::get('home',[HomeController::class, 'index'])->name('home') ;
    Route::get('user',[UserController::class, 'index'])->name('user') ;
    Route::get('input-user',[UserController::class, 'tambahUser'])->name('inputuser') ;
    Route::post('simpan-user',[UserController::class, 'save'])->name('simpan-user') ;
    Route::get('edit-user/{id}',[UserController::class, 'edituser'])->name('edit-user') ;
    Route::post('update-user/{id}',[UserController::class, 'updateuser'])->name('update-user') ;
    Route::get('hapus-user/{id}',[UserController::class, 'hapus'])->name('hapus-user') ;
    
    Route::get('data',[DataController::class, 'index'])->name('data') ;
    Route::get('input-data',[DataController::class, 'tambahData'])->name('inputdata') ;
    Route::post('simpan-data',[DataController::class, 'save'])->name('simpan-data') ;
    Route::get('edit-data/{id}',[DataController::class, 'editdata'])->name('edit-data') ;
    Route::post('update-data/{id}',[DataController::class, 'updatedata'])->name('update-data') ;
    Route::get('hapus-data/{id}',[DataController::class, 'hapus'])->name('hapus-data') ;

    Route::get('kategori',[KategoriController::class, 'index'])->name('kategori') ;
    Route::get('input-kategori',[KategoriController::class, 'tambahKategori'])->name('inputkategori') ;
    Route::post('simpan-kategori',[KategoriController::class, 'save'])->name('simpan-kategori') ;
    Route::get('edit-kategori/{id}',[KategoriController::class, 'editkategori'])->name('edit-kategori') ;
    Route::post('update-kategori/{id}',[KategoriController::class, 'updatekategori'])->name('update-kategori') ;
    Route::get('hapus-kategori/{id}',[KategoriController::class, 'hapus'])->name('hapus-kategori') ;
    
    Route::get('barang',[BarangController::class, 'index'])->name('barang') ;
    Route::get('input-barang',[BarangController::class, 'tambahBarang'])->name('inputbarang') ;
    Route::post('simpan-barang',[BarangController::class, 'save'])->name('simpan-barang') ;
    Route::get('edit-barang/{id}',[BarangController::class, 'editbarang'])->name('edit-barang') ;
    Route::post('update-barang/{id}',[BarangController::class, 'updatebarang'])->name('update-barang') ;
    Route::get('hapus-barang/{id}',[BarangController::class, 'hapus'])->name('hapus-barang') ;

    Route::get('trans/{tanggal?}',[TransController::class, 'index'])->name('trans') ;
    Route::get('input-trans',[TransController::class, 'tambahTrans'])->name('inputtrans') ;
    Route::post('simpan-trans',[TransController::class, 'save'])->name('simpan-trans') ;
    Route::get('cetak-trans/{id}',[TransController::class, 'cetaktrans'])->name('cetak-trans') ;
    Route::post('update-trans/{id}',[TransController::class, 'updatetrans'])->name('update-trans') ;
    Route::get('hapus-trans/{id}',[TransController::class, 'hapus'])->name('hapus-trans') ;
    Route::post('data',[TransController::class, 'data'])->name('data') ;

    Route::post('simpan-keranjang',[TransController::class, 'keranjang'])->name('simpan-keranjang') ;
    Route::get('det-trans/{id}',[TransController::class, 'dettrans'])->name('det-trans') ;
    Route::get('cetak-lap',[TransController::class, 'index'])->name('cetaklap') ;
    Route::post('filtertgl',[TransController::class, 'filtertanggal'])->name('filtertgl') ;

    
    Route::post('logout',[LoginController::class, 'logout'])->name('logout') ;
});


