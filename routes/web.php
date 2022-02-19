
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
    return view('home', [
        'title' => "Home",
        'jumbojudul' => "My Points",
        'jumboisi' => "My Points adalah website yang terkait dengan point siswa, "
    ]);
});
Route::get('/tentang', function () {
    return view('navdir.home.tentang', [
        'title' => "Tentang",
        'jumbojudul' => "Tentang Kami",
        'jumboisi' => ""
    ]);
});
Route::get('/kontak', function () {
    return view('navdir.home.kontak', [
        'title' => "Kontak",
        'jumbojudul' => "Kontak Kami",
        'jumboisi' => ""
    ]);
});
Route::view('dashboard', 'dashboard');

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::view('dashboard', 'dashboard');
    Route::view('contacts', 'navdir.dashboard.contacts');
    Route::view('kelas', 'navdir.dashboard.kelas');
    Route::view('siswa', 'navdir.dashboard.kelas');
    Route::view('penghargaan', 'navdir.dashboard.penghargaan');
    Route::view('pelanggaran', 'navdir.dashboard.pelanggaran');
});

Route::group(['middleware' => 'role:pelapor', 'prefix' => 'pelapor', 'as' => 'pelapor.'], function() {
    Route::view('dashboard', 'dashboard');
    Route::view('kelas', 'navdir.dashboard.kelas');
    Route::view('siswa', 'navdir.dashboard.siswa');
});

Route::group(['middleware' => 'role:siswa', 'prefix' => 'siswa', 'as' => 'siswa.'], function() {
    Route::view('dashboard', 'dashboard');
    Route::view('kelas', 'kelas');
    Route::view('siswa', 'siswa');
});

require __DIR__.'/auth.php';
