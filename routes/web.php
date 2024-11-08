<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatakaryawanController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); // Menambahkan rute autentikasi default dari Laravel
Route::get('/home', function () {
    return view('dashboard.dashboard');
})->name('home');
/*Route::get('/home', function () {
    return view('dashboard.dashboard');
})->name('home')->middleware('auth');

Route::middleware(['auth'])->get('/home', function () {
    return view('dashboard.dashboard');
});*/


Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('datakaryawan', DatakaryawanController::class)->middleware('auth');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/datakaryawan/{id}/make-user', [DatakaryawanController::class, 'makeUser'])->name('datakaryawan.makeUser');

Route::get('/datakaryawan/{nik}/transfer-to-user', [DatakaryawanController::class, 'transferToUser'])->name('datakaryawan.transferToUser');

Route::get('/datakaryawan/fetch', [DatakaryawanController::class, 'fetchData'])->name('datakaryawan.fetch');

Route::get('/files', [FileController::class, 'index'])->name('files.index');
Route::post('/files', [FileController::class, 'store'])->name('files.store');
Route::get('/files/download/{id}', [FileController::class, 'download'])->name('files.download');

Route::post('/file/upload', [FileController::class, 'upload'])->name('file.upload');
Route::get('/file/download/{id}', [FileController::class, 'download'])->name('file.download');

Route::resource('users', UserController::class);
