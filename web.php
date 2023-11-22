<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class,'authenticate']);

Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create' ])->name('buku.create');
Route::post('/bukus', 'BukuController@store')->name('bukus.store');
Route::get('/buku/{id}', [BukuController::class, 'show' ])->name('buku.show');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit' ])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update' ])->name('buku.update');
Route::delete('/buku/{id}', [BukuController::class, 'destroy' ])->name('buku.destroy');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
