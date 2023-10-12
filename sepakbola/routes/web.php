<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\KlasemenController;
use App\Http\Controllers\SkorController;

Route::get('/', 'HomeController@home')->name('clubs.home');
Route::get('/klasemen', [KlasemenController::class, 'klasemen'])->name('clubs.klasemen');
Route::get('/input_club_form', [ClubController::class, 'create'])->name('clubs.create');
Route::post('/simpan_klub', [ClubController::class, 'store'])->name('clubs.store');


// Tambahkan rute untuk menangani penyimpanan skor pertandingan
Route::get('/skor/create', [SkorController::class, 'create'])->name('skor.create');
Route::post('/skor', [SkorController::class, 'store'])->name('skor.store');
