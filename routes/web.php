<?php

use App\Http\Controllers\AlmarhumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;

Route::get('/pengukuran', function () {
    return view('pengukuran'); // Tampilkan form
});

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

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// Route untuk menampilkan semua pelapor
Route::get('/pelapor', [PelaPorController::class, 'index'])->name('pelapor.index')->middleware('auth');

// Route untuk menampilkan form tambah data pelapor
Route::get('/pelapor/create', [PelaporController::class, 'create'])->name('pelapor.create');
Route::get('/pelapor/{id}/edit', [PelaporController::class, 'edit'])->name('pelapor.edit');
Route::put('/pelapor/{id}', [PelaporController::class, 'update'])->name('pelapor.update');

// Route untuk menyimpan data pelapor
Route::post('/pelapor/store', [PelaporController::class, 'store'])->name('pelapor.store');

// Route untuk menghapus data pelapor
Route::delete('/pelapor/{id}', [PelaporController::class, 'destroy'])->name('pelapor.destroy')->middleware('auth');
Route::get('/pelapor/{id}', [PelaporController::class, 'show'])->name('pelapor.show')->middleware('auth');

Route::resource('/almarhum', AlmarhumController::class)->except('destroy', 'create', 'show', 'update' . 'edit')->middleware('auth');
Route::get('/almarhum/create', [AlmarhumController::class, 'create'])->name('almarhum.create')->middleware('auth');
Route::post('/almarhum/store', [AlmarhumController::class, 'store'])->name('almarhum.store')->middleware('auth');
Route::get('/almarhum/{id}', [AlmarhumController::class, 'show'])->name('almarhum.show')->middleware('auth');

Route::delete('/almarhum/{id}', [almarhumController::class, 'destroy'])->name('almarhum.destroy')->middleware('auth');
Route::get('/almarhum/pdf/{id}', [almarhumController::class, 'printPDF'])->name('almarhum.pdf')->middleware('auth');
Route::get('/cetak-almarhum', [almarhumController::class, 'cetak'])->withoutMiddleware('auth');
Route::get('/cetak-semua-almarhum', [almarhumController::class, 'cetakSemua'])->name('almarhum.semua')->middleware('auth');

Route::resource('/user', UserController::class)->middleware('auth');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('/laporan', [UserController::class, 'laporan'])->name('laporan.index')->middleware('auth');

Route::get('login', [LoginController::class, 'loginView'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
