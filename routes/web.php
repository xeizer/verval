<?php

use App\Http\Controllers\CekController;
use App\Http\Controllers\HomeController;
use App\Livewire\Alamat;
use App\Livewire\Biodata;
use App\Livewire\Semua;
use App\Livewire\Uploadkotkeckel;
use App\Livewire\Uploadsiswa;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/cek', [CekController::class, 'cekNisn'])->name('ceknisn');
Route::get('/upload', Uploadsiswa::class)->middleware(['auth', 'role:su']);
Route::get('/uploadkotkeckel', Uploadkotkeckel::class)->middleware(['auth', 'role:su']);
Route::get('/biodata', Biodata::class)->name('biodata');
Route::get('/alamat', Alamat::class)->name('alamat');
Route::get('/pengecekan', Semua::class)->name('allinone');
Route::get('/ktp/{nisn}', [CekController::class, 'verval']);
