<?php

use App\Http\Controllers\PegadaianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponController;


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

Route::get('/', [PegadaianController::class, 'index'])->name('home');
Route::get('/login', [PegadaianController::class, 'login'])->name('login');
Route::post('/auth', [PegadaianController::class, 'auth'])->name('auth');
Route::post('/store', [PegadaianController::class, 'store'])->name('store.data');
Route::delete('/hapus/{id}', [PegadaianController::class, 'destroy'])->name('delete');

Route::middleware('islogin', 'CekRole:admin' )->group(function(){
    Route::get('/data-admin', [PegadaianController::class, 'dataAdmin'])->name('data.admin');
    Route::get('/export/pdf', [PegadaianController::class, 'createPDF'])->name('export.pdf');
    Route::get('/export/excel', [PegadaianController::class,  'createExcel'])->name('export.excel');  
});

Route::middleware('islogin', 'CekRole:petugas' )->group(function(){
    Route::get('/data-petugas', [PegadaianController::class, 'dataPetugas'])->name('data.petugas');
    Route::get('respon/edit/{pegadaian_id}', [ResponController::class,'edit'])->name('respon.edit');
    Route::patch('respon/update/{pegadaian_id}', [ResponController::class,'update'])->name('respon.update');
});

Route::middleware('islogin', 'CekRole:admin,petugas' )->group(function(){
    Route::get('/logout', [PegadaianController::class, 'logout'])->name('logout');
    
});