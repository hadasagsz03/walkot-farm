<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TanamanController;

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
// Route::get('/login', [AuthController::class, 'login']);