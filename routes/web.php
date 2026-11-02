<?php

use App\Http\Controllers\CvController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\ProfilController;

// Halaman CV publik (data diambil dari tabel Portofolio_1027 & Skill_1027)
Route::get('/', [CvController::class, 'index'])->name('cv');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/home',[HomeController::class,'index']);


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('portofolio', PortofolioController::class)->except('show');
    Route::resource('skill', SkillController::class)->except('show');
    Route::resource('pendidikan', PendidikanController::class)->except('show');
    Route::get('profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('profil', [ProfilController::class, 'update'])->name('profil.update');
});
