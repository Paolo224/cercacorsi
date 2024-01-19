<?php

use App\Http\Controllers\Admin\CoursesController as AdminCoursesController;
use App\Http\Controllers\Admin\AgencyController as AdminAgencyController;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\PagamentoController;
use App\Http\Controllers\Admin\SegretariaController;
use App\Http\Controllers\Auth\RegisteredUserController;
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
    Route::patch('/{agency}/toggle', [AdminAgencyController::class, 'enableToggle'])->name('toggle');

    Route::resource('/le-mie-aziende', AdminAgencyController::class)->parameters([
        'le-mie-aziende' => 'agency' // Cambia il nome del parametro da 'agency' a 'le-mie-aziende'
    ]);

    Route::resource('/tutti-i-corsi', AdminCoursesController::class)->parameters([
        'tutti-i-corsi' => 'course' // Cambia il nome del parametro da 'course' a 'tutti-i-corsi'
    ]);

    Route::get('/404', function () {
        return view('admin.404');
    })->name('404');

    Route::middleware(['auth', 'verified', 'check_admin_access'])->group(function () {
        Route::get('/', [DashboardController::class, 'index']);

        Route::get('/wallet', function () {
            return view('admin.wallet');
        })->name('wallet');

        // PAYPAL
        Route::post('/pagamento', [PagamentoController::class, 'pagamento'])->name('pagamento');
        Route::get('/pagamento-avvenuto', [PagamentoController::class, 'avvenuto'])->name('pagamento-avvenuto');
        Route::get('/pagamento-rifiutato', [PagamentoController::class, 'rifiutato'])->name('pagamento-rifiutato');
        // PAYPAL

        Route::get('/segreteria', function () {
            return view('admin.segreteria');
        })->name('segreteria');

        // REGISTRAZIONE SEGRETARIO
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
        Route::post('/elimina-utente', [SegretariaController::class, 'eliminaUtente'])->name('elimina.utente');
        // REGISTRAZIONE SEGRETARIO
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
