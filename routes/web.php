<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ComputerController;

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
Route::get('/admin', function () {
    return view('admin.login_admin');
})->name('admin');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');
Route::post('/postloginAdmin',[LoginController::class, 'postloginAdmin'])->name('postloginAdmin');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/logoutAdmin',[LoginController::class, 'logoutAdmin'])->name('logoutAdmin');

Route::group(['middleware' => ['auth','ceklevel:dosen,mahasiswa']], function() {
    Route::get('/', [PagesController::class, 'index']);
    Route::post('/pesan', [MessageController::class, 'kirim']);
    Route::get('/jadwal/sekret', [JadwalController::class, 'sekret']);
    Route::get('/jadwal/301', [JadwalController::class, 'lab301']);
    Route::get('/jadwal/302', [JadwalController::class, 'lab302']);
    Route::get('/jadwal/303', [JadwalController::class, 'lab303']);
    Route::get('/jadwal/401', [JadwalController::class, 'lab401']);
    Route::get('/jadwal/402', [JadwalController::class, 'lab402']);
    Route::get('/jadwal/403', [JadwalController::class, 'lab403']);
    Route::get('/peraturan', [PagesController::class, 'peraturan']);
    Route::get('/status', [PengajuanController::class, 'status']);
    Route::get('/profil/{id}', [ProfileController::class, 'profil']);
    Route::get('/password', [ProfileController::class, 'password']);
    Route::post('/password', [ProfileController::class, 'ganti_password']);
    Route::post('/update-profil', [ProfileController::class, 'update']);
});

Route::group(['middleware' => ['auth','ceklevel:dosen,mahasiswa']], function() {
    Route::get('/peminjaman/Sekret', [PeminjamanController::class, 'peminjaman_sekret']);
    Route::get('/peminjaman/301', [PeminjamanController::class, 'peminjaman_301']);
    Route::get('/peminjaman/302', [PeminjamanController::class, 'peminjaman_302']);
    Route::get('/peminjaman/303', [PeminjamanController::class, 'peminjaman_303']);
    Route::get('/peminjaman/401', [PeminjamanController::class, 'peminjaman_401']);
    Route::get('/peminjaman/402', [PeminjamanController::class, 'peminjaman_402']);
    Route::get('/peminjaman/403', [PeminjamanController::class, 'peminjaman_403']);
    Route::get('/ajax_sekret', [PeminjamanController::class, 'ajax_sekret']);
    Route::get('/ajax_301', [PeminjamanController::class, 'ajax_301']);
    Route::get('/ajax_302', [PeminjamanController::class, 'ajax_302']);
    Route::get('/ajax_303', [PeminjamanController::class, 'ajax_303']);
    Route::get('/ajax_401', [PeminjamanController::class, 'ajax_401']);
    Route::get('/ajax_402', [PeminjamanController::class, 'ajax_402']);
    Route::get('/ajax_403', [PeminjamanController::class, 'ajax_403']);
    Route::post('/peminjaman/pengajuan', [PeminjamanController::class, 'pengajuan']);
    Route::post('/store', [PengajuanController::class, 'store']);
});

Route::group(['middleware' => ['auth','ceklevel:admin']], function() {
    Route::get('/dashboard', [PagesController::class, 'admin']);
    Route::get('/daftar/pengajuan', [PengajuanController::class, 'show']);
    Route::get('/jadwal/view/301',[AdminJadwalController::class, 'jadwal_301']);
    Route::get('/jadwal/view/302',[AdminJadwalController::class, 'jadwal_302']);
    Route::get('/jadwal/view/303',[AdminJadwalController::class, 'jadwal_303']);
    Route::get('/jadwal/view/401',[AdminJadwalController::class, 'jadwal_401']);
    Route::get('/jadwal/view/402',[AdminJadwalController::class, 'jadwal_402']);
    Route::get('/jadwal/view/403',[AdminJadwalController::class, 'jadwal_403']);
    Route::get('/jadwal/view/class',[AdminJadwalController::class, 'jadwal_kelas']);
    Route::post('/update_status',[AdminJadwalController::class, 'update_status']);
    Route::post('/update/{id}',[AdminJadwalController::class, 'update_jadwal']);
    Route::get('/edit/{id}',[AdminJadwalController::class, 'edit_jadwal']);
    Route::delete('/delete/{id}',[AdminJadwalController::class, 'delete_jadwal']);
    Route::get('/edit/class/{id}',[AdminJadwalController::class, 'edit_kelas']);
    Route::delete('/delete/class/{id}',[AdminJadwalController::class, 'delete_kelas']);
    Route::post('/update/class/{id}',[AdminJadwalController::class, 'update_kelas']);
    Route::post('/update_pengajuan/{id}',[PengajuanController::class, 'update_pengajuan']);
    Route::get('/edit_pengajuan/{id}',[PengajuanController::class, 'edit_pengajuan']);
    Route::post('/save_pengajuan/{id}',[PengajuanController::class, 'save_pengajuan']);
    Route::post('/selesaikan/{id}',[PengajuanController::class, 'selesai_pengajuan']);
    Route::delete('/pengajuan/delete/{id}',[PengajuanController::class, 'delete_pengajuan']);
    Route::get('/computer/lab',[ComputerController::class, 'index']);
    Route::get('/ajax_display',[ComputerController::class, 'ajax']);
});
