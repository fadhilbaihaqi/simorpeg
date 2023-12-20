<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaMonitoringController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KelolaPegawaiController;
use App\Http\Controllers\PenilaianPegawaiController;
use App\Http\Controllers\LaporanController;
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



// Login
Route::get('/', [LoginController::class, 'index'])->name('login'); // alamat '/' akan mengarahkan ke LoginController masuk ke function index
// Route::get('/login', [LoginController::class, 'index'])->name('login'); // alamat '/login' akan mengarahkan ke LoginController masuk ke function index
Route::post('/auth', [LoginController::class, 'authenticate'])->name('auth'); // alamat '/auth' akan mengarahkan ke LoginController masuk ke function authenticate

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // alamat '/dashboard' akan mengarahkan ke DashboardController masuk ke function index
    Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout'); // alamat '/logout' akan mengarahkan ke LoginController masuk ke function logout


    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index'); // alamat '/laporan' akan mengarahkan ke LaporanController masuk ke function index
    Route::get('/laporan/show/{id}', [LaporanController::class, 'show'])->name('laporan.show'); // alamat '/laporan/show/{id}' akan mengarahkan ke LaporanController masuk ke function show dengan parameter id yang dipilih


    // Kelola_monitoring
    Route::get('/kelolamonitoring', [KelolaMonitoringController::class, 'index'])->name('kelolamonitoring.index'); // alamat '/kelolamonitoring' akan mengarah ke KelolaMonitoringControlloer masuk ke function index
    Route::get('/kelolamonitoring/create', [KelolaMonitoringController::class, 'create'])->name('kelolamonitoring.create'); //alamat /kelolamonitoring/create akan mengaraha ke KelolaMonitoringController masuk ke function create
    Route::post('/kelolamonitoring', [KelolaMonitoringController::class, 'store'])->name('kelolamonitoring.post');
    Route::get('/kelolamonitoring/edit/{id}', [KelolaMonitoringController::class, 'edit'])->name('kelolamonitoring.edit');
    Route::post('/kelolamonitoring/update/{id}', [KelolaMonitoringController::class, 'update'])->name('kelolamonitoring.update');
    Route::post('/kelolamonitoring/validateTask/{id}', [KelolaMonitoringController::class, 'validateTask'])->name('kelolamonitoring.validateTask');
    Route::get('/kelolamonitoring/delete/{id}', [KelolaMonitoringController::class, 'destroy'])->name('kelolamonitoring.delete');


    //PenilaianPegawai
    Route::get('/penilaianpegawai', [PenilaianPegawaiController::class, 'index'])->name('penilaianpegawai.index');
    Route::get('/penilaianpegawai/show/{id}', [PenilaianPegawaiController::class, 'show'])->name('penilaianpegawai.show');
    Route::post('/penilaianpegawai/{id}', [PenilaianPegawaiController::class, 'store'])->name('penilaianpegawai.store');
    Route::post('/penilaianpegawai/update/{id}', [PenilaianPegawaiController::class, 'update'])->name('penilaianpegawai.update');


    //Crud kelola_pegawai
    Route::get('/kelolapegawai', [KelolaPegawaiController::class, 'index'])->name('kelolapegawai');
    Route::get('/kelolapegawai/tambah_data', [KelolaPegawaiController::class, 'tambah_data'])->name('kelolapegawai.tambah_data'); //ini untuk ke halaman form tambah data
    Route::post('/kelolapegawai/simpan_data', [KelolaPegawaiController::class, 'store'])->name('kelolapegawai.simpan_data'); //ini untuk simpan atau input data
    Route::get('/kelolapegawai/edit_data/{id}', [KelolaPegawaiController::class, 'edit_data'])->name('kelolapegawai.edit_data'); //ini untuk edit data
    Route::post('/kelolapegawai/update_data/{id}', [KelolaPegawaiController::class, 'update_data'])->name('kelolapegawai.update_data'); //ini untuk update data
    Route::get('/kelolapegawai/delete_data/{id}', [KelolaPegawaiController::class, 'delete_data'])->name('kelolapegawai.delete_data'); //ini untuk hapus data 

    //Search
    // Route::get('/search', [KelolaPegawaiController::class, 'search'])->name('search');
});
