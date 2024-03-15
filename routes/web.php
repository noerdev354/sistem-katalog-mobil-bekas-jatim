<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\User\BerandaController::class, 'index'])->name('beranda.index');

// Auth::routes();
Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'storeUser']);

Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'authenticate']);

Route::get('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard/index', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/katalog/index', [App\Http\Controllers\Admin\KatalogController::class, 'index'])->name('katalog.index');
Route::post('/katalog/create', [App\Http\Controllers\Admin\KatalogController::class, 'create'])->name('katalog.create');
Route::delete('/katalog/delete/{id}', [App\Http\Controllers\Admin\KatalogController::class, 'destroy'])->name('katalog.delete');

Route::get('/sales/index', [App\Http\Controllers\Admin\SalesController::class, 'index'])->name('sales.index');
Route::post('/sales/create', [App\Http\Controllers\Admin\SalesController::class, 'create'])->name('sales.create');
Route::delete('/sales/delete/{id}', [App\Http\Controllers\Admin\SalesController::class, 'destroy'])->name('sales.delete');

Route::get('/iklan/index', [App\Http\Controllers\Admin\IklanController::class, 'index'])->name('iklan.index');
Route::post('/iklan/create', [App\Http\Controllers\Admin\IklanController::class, 'create'])->name('iklan.create');
Route::delete('/iklan/delete/{id}', [App\Http\Controllers\Admin\IklanController::class, 'destroy'])->name('iklan.delete');

Route::get('/pesan/index', [App\Http\Controllers\Admin\PesanController::class, 'index'])->name('pesan.index')->middleware('auth');;
Route::post('/pesan/create', [App\Http\Controllers\Admin\PesanController::class, 'create'])->name('pesan.create');
Route::delete('/pesan/delete/{id}', [App\Http\Controllers\Admin\PesanController::class, 'destroy'])->name('pesan.delete')->middleware('auth');;

Route::get('/master-data/merk/index', [App\Http\Controllers\Admin\MasterData\MerkController::class, 'index'])->name('master_data.merk.index');
Route::post('/master-data/merk/create', [App\Http\Controllers\Admin\MasterData\MerkController::class, 'create'])->name('master_data.merk.create');
Route::delete('/master-data/merk/delete/{id}', [App\Http\Controllers\Admin\MasterData\MerkController::class, 'destroy'])->name('master_data.merk.delete');

Route::get('/master-data/tipe/index', [App\Http\Controllers\Admin\MasterData\TipeController::class, 'index'])->name('master_data.tipe.index');
Route::post('/master-data/tipe/create', [App\Http\Controllers\Admin\MasterData\TipeController::class, 'create'])->name('master_data.tipe.create');
Route::delete('/master-data/tipe/delete/{id}', [App\Http\Controllers\Admin\MasterData\TipeController::class, 'destroy'])->name('master_data.tipe.delete');

