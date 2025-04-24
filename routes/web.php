<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'main']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/tanaman/detail/{id_tanaman}', [TanamanController::class, 'detail']);
Route::get('/tanaman/kategori/{kategori}', [TanamanController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'main']);
Route::get('/berita/{id}', [BeritaController::class, 'detail_berita']);
Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');

Route::get('/login', [AuthController::class, 'login_view'])->name('login');
Route::post('/login', [AuthController::class, 'login_auth'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/reload-captcha', [AuthController::class, 'reloadCaptcha'])->name('reload.captcha');

Route::get('/admin/main', [AdminController::class, 'index'])->name('admin.home.dashboard');
Route::get('/admin/main', [AdminController::class, 'main'])->name('admin.home.dashboard');

Route::get('/admin/tanaman/list', [TanamanController::class, 'list'])->name('admin.tanaman.list');
Route::get('/admin/tanaman/{id_tanaman}/detail', [TanamanController::class, 'show'])->name('admin.tanaman.detail');
Route::get('/admin/tanaman/kategori/{kategori}', [TanamanController::class, 'filterByKategori'])->name('admin.tanaman.list');
Route::get('/admin/tanaman/{id}/edit', [TanamanController::class, 'edit'])->name('admin.tanaman.edit');
Route::put('/admin/tanaman/{id}', [TanamanController::class, 'update'])->name('admin.tanaman.update');
Route::delete('/admin/tanaman/{id}', [TanamanController::class, 'destroy'])->name('admin.tanaman.delete');
Route::get('/admin/tanaman/create', [TanamanController::class, 'create'])->name('admin.tanaman.create');
Route::post('/admin/tanaman/store', [TanamanController::class, 'store'])->name('admin.tanaman.store');
Route::get('/admin/home/cari', [TanamanController::class, 'cari'])->name('admin.home.cari');
Route::get('admin/tanaman/{id_tanaman}/detail', [TanamanController::class, 'show'])->name('admin.tanaman.detail');
Route::get('/admin/tanaman/all', [TanamanController::class, 'showAll'])->name('admin.tanaman.all');

Route::get('/admin/berita', [AdminController::class, 'berita'])->name('admin.berita');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('berita', BeritaController::class);
});
Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
Route::post('/admin/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
Route::get('/admin/berita/show/{id}', [BeritaController::class, 'show'])->name('admin.berita.show');
