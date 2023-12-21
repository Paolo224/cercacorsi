<?php

use App\Http\Controllers\Admin\CoursesController as AdminCoursesController;
use App\Http\Controllers\Admin\AgencyController as AdminAgencyController;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/le-mie-aziende', AdminAgencyController::class)->parameters([
        'le-mie-aziende' => 'agency' // Cambia il nome del parametro da 'agency' a 'le-mie-aziende'
    ]);
    Route::get('/tutti-i-corsi/Visibili', [AdminCoursesController::class, 'Visibili'])->name('tutti-i-corsi.Visibili');
    Route::get('/tutti-i-corsi/NonVisibili', [AdminCoursesController::class, 'NonVisibili'])->name('tutti-i-corsi.NonVisibili');
    Route::get('/tutti-i-corsi/Categoria', [AdminCoursesController::class, 'Categoria'])->name('tutti-i-corsi.Categoria');
    Route::get('/tutti-i-corsi/Agency', [AdminCoursesController::class, 'Agency'])->name('tutti-i-corsi.Agency');
    Route::resource('/tutti-i-corsi', AdminCoursesController::class)->parameters([
        'tutti-i-corsi' => 'course' // Cambia il nome del parametro da 'course' a 'tutti-i-corsi'
    ]);
    // altre rotte protette da login e che siano in admin
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
