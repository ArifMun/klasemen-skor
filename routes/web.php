<?php

use App\Http\Controllers\DataClubController;
use App\Http\Controllers\KelasemenSkorKontroller;
use App\Http\Controllers\SkorController;
use App\Models\DataClub;
use Illuminate\Support\Facades\Route;

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

Route::get('/tambah-klub', [DataClubController::class, 'index']);
Route::post('/tambah-klub/tambah', [DataClubController::class, 'store']);

Route::get('/tambah-skor', [SkorController::class, 'index']);
Route::post('/tambah-skor/tambah', [SkorController::class, 'store']);
Route::get('/multiple-tambah-skor', [SkorController::class, 'multipleIndex']);
Route::post('/multiple-tambah-skor/tambah', [SkorController::class, 'multipleStore']);

Route::get('/kelasemen', [KelasemenSkorKontroller::class, 'index']);
