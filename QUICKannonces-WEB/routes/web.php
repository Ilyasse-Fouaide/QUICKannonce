<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VilleController;
use App\Models\User;

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


// * protected routes from Unauthentication access...
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return back();
    });

    Route::resource('/annonce', AnnonceController::class);

    Route::get('/annonces', [AnnonceController::class, "all"])
        ->name('annonce.all')
        ->middleware('admin');

    Route::delete('/delete-annonce/{annonce}', [AnnonceController::class, "delete"])
        ->name('delete-annonce')
        ->middleware('admin');

    Route::resource('/ville', VilleController::class)
        ->middleware('admin');

    Route::resource('/category', CategoryController::class)
        ->middleware('admin');

    Route::get('/annonce/admin/validation', [AnnonceController::class, 'pendingAnnonce'])
        ->middleware('admin')
        ->name('annonce.pendingAnnonce');

    Route::put('annonce/admin/{annonce}', [AnnonceController::class, 'validAnnonce'])
        ->middleware('admin')
        ->name('annonce.validAnnonce');

    Route::get('/auth/index', [AuthController::class, "index"])
        ->name('auth.index')
        ->middleware('admin');

    Route::delete('/auth/destroy/{user}', [AuthController::class, "destroy"])
        ->name('auth.destroy')
        ->middleware('admin');
});

Route::get('/annonce', [AnnonceController::class, "index"])
    ->name('annonce.index');

Route::get('/sign-up', [AuthController::class, 'showRegisterForm'])
    ->name('auth.showRegisterForm');

Route::get('/sign-in', [AuthController::class, 'showLoginForm'])
    ->name('auth.showLoginForm');

Route::post('/register', [AuthController::class, 'register'])
    ->name('auth.register');

Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');
