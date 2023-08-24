<?php

use App\Models\SuratMasuk;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use RealRashid\SweetAlert\Facades\Alert;
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
Route::post('/surat_masuk/tambah', [SuratController::class, 'tsm'])->name('tambah_surat_m')->middleware('auth');
Route::post('/surat_masuk/update/{id}', [SuratController::class, 'update_tsm'])->name('update_surat_m')->middleware('auth');
Route::get('/surat_masuk/hapus/{id}', [SuratController::class, 'hapus'])->middleware('auth');
Route::get('/surat_masuk/trash', [SuratController::class, 'trash_srt_m'])->name('trash_m')->middleware('auth');
Route::get('/restore/{id}', [SuratController::class, 'restore_srt_m'])->name('restore')->middleware('auth');
Route::get('hapus_permanen/{id}', [SuratController::class, 'hapus_permanen'])->name('hapus_p')->middleware('auth');
// Route::get('/surat_masuk/view', [SuratController::class, 'view_doc'])->name('view-doc')->middleware('auth');
Route::get('/sortir_surat', [SuratController::class, 'sortir_srt_m'])->name('sortir_m');

Route::get('/surat_keluar', [SuratController::class, 'surat_k'])->name('surat-keluar')->middleware('auth');
Route::post('/surat_keluar/tambah', [SuratController::class, 'tsk'])->name('tambah_surat_k')->middleware('auth');
Route::post('/surat_keluar/update/{id}', [SuratController::class, 'update_tsk'])->name('update_surat_k')->middleware('auth');
Route::get('/surat_keluar/hapus/{id}', [SuratController::class, 'hapus_sk'])->middleware('auth');

Route::get('/user', [UserController::class, 'user_all'])->name('user-all');
Route::post('/user/add', [UserController::class, 'add_user'])->name('add-user');
Route::get('/user/hapus/{id}', [UserController::class, 'hapus_user'])->name('hapus-user');
Route::post('/user/update/{id}', [UserController::class, 'update_user'])->name('update-user');

Route::get('/error404', [SuratController::class, 'error404'])->name('error');
Route::get('/no_otomatis', [SuratController::class, 'no_otomatis']);



