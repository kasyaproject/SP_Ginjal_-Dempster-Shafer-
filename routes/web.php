<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\registController;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\loginPasienController;


Route::get('/', [GuestController::class, 'index']); // HALAMAN HOME
Route::post('/result', [GuestController::class, 'result'])->name('result'); // HALAMAN HASIL DIAGNOSA
Route::get('/form', [GuestController::class, 'form']) // HALAMN FORM DIAGNOSA DENGAN MIDDLEWARE
    ->middleware(['auth', 'throttle:60,1'])
    ->name('form');

Route::get('Artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show'); // HALAMAN READ ARTIKEL

Route::resource('loginPasien', loginPasienController::class); // View Login Form
Route::post('/loginPasien', [loginPasienController::class, 'login'])->name('loginPasien.login'); // HALAMAN HASIL DIAGNOSA
Route::get('settingPasien/{id}', [loginPasienController::class, 'show'])->name('settingPasien.show'); // HALAMAN READ ARTIKEL
Route::get('logoutPasien', [loginPasienController::class, 'logout'])->name('logoutPasien.logout'); // Proses Logout
Route::resource('registPasien', registController::class); // View Login Form

Route::resource('Admin', LoginController::class); // View Login Form
Route::post('Admin', [LoginController::class, 'login'])->name('admin.login'); // Proses login
Route::get('logout', [LoginController::class, 'logout'])->name('logout'); // Proses Logout

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('profil', ProfilController::class);
    Route::post('profil/{id}', [ProfilController::class, 'changePass'])->name('profil.changePass');

    Route::resource('Pasien', PasienController::class);
    Route::resource('Gejala', GejalaController::class);
    Route::resource('Penyakit', PenyakitController::class);
    Route::resource('Solusi', SolusiController::class);

    Route::resource('Artikel', ArtikelController::class);
    Route::resource('Pengguna', PenggunaController::class);
});

// Route::middleware('auth')->group(function () {
//     Route::resource('profil', ProfilController::class);
//     Route::post('profil/{id}', [ProfilController::class, 'changePass'])->name('profil.changePass');

//     Route::resource('Pasien', PasienController::class);
//     Route::resource('Gejala', GejalaController::class);
//     Route::resource('Penyakit', PenyakitController::class);
//     Route::resource('Solusi', SolusiController::class);

//     Route::resource('Artikel', ArtikelController::class);
//     Route::resource('Pengguna', PenggunaController::class);
// });

require __DIR__ . '/auth.php';
