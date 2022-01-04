
<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// Route::get('dashboard', [DashboardController::class, 'index']);

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    // Route::get('profil.kelas', [ProfilController::class, 'index'])->name('kelas');
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::group(['prefix' => 'pelanggaran', 'as' => 'pelangaran.'], function() {
        Route::resource('kategori', \App\Http\Controllers\KategoriPelanggaranController::class);
        Route::resource('jenis', \App\Http\Controllers\JenisPelanggaranController::class);
        Route::resource('record', \App\Http\Controllers\RecordPelanggaranController::class);
        Route::resource('pelaporan', \App\Http\Controllers\PelaporanPelanggaranController::class);
    });
    Route::resource('pelanggaran', \App\Http\Controllers\PelanggaranController::class);
    Route::group(['prefix' => 'penghargaan', 'as' => 'penghargaan.'], function() {
        Route::resource('record', \App\Http\Controllers\RecordPenghargaanController::class);
        Route::resource('pelaporan', \App\Http\Controllers\PelaporanPenghargaanController::class);
    });
    Route::resource('kelas', \App\Http\Controllers\KelasController::class);
    Route::resource('siswa', \App\Http\Controllers\SiswaController::class);
    Route::resource('pelapor', \App\Http\Controllers\PelaporController::class);
    Route::resource('wali', \App\Http\Controllers\WaliMuridController::class);
    Route::resource('books', \App\Http\Controllers\BooksController::class);
});

Route::group(['middleware' => 'role:pelapor', 'prefix' => 'pelapor', 'as' => 'pelapor.'], function() {
    // Route::get('profil.kelas', [ProfilController::class, 'index'])->name('kelas');
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('books', \App\Http\Controllers\BooksController::class);
});

Route::group(['middleware' => 'role:siswa', 'prefix' => 'siswa', 'as' => 'siswa.'], function() {
    // Route::get('profil.kelas', [ProfilController::class, 'index'])->name('kelas');
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('books', \App\Http\Controllers\BooksController::class);
});

require __DIR__.'/auth.php';
