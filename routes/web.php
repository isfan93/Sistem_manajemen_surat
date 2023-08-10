<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/home', [LoginController::class, 'home'])->name('home')->middleware('auth');
Route::post('/login',[LoginController::class, 'auth'])->name('login')->middleware('guest');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/surat_masuk', [SuratController::class, 'surat_m'])->name('surat-masuk')->middleware('auth');
Route::get('/surat_keluar', [SuratController::class, 'surat_k'])->name('surat-keluar')->middleware('auth');
Route::get('/surat_masuk/view', [SuratController::class, 'view_doc'])->name('view-doc')->middleware('auth');
Route::get('/surat_m/sortir_surat', [SuratController::class, 'surat_m'])->name('sortir');

Route::get('/error404', [SuratController::class, 'error404'])->name('error');




