<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VilleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // ! ---- Admin Routes ----
    Route::get('/admin/membres', [AuthController::class, 'index'])
        ->middleware('admin');

    Route::delete('/admin/delete-membre/{user}', [AuthController::class, 'destroy'])
        ->middleware('admin');

    Route::resource('/admin/category', CategoryController::class)
        ->middleware('admin');

    Route::resource('/admin/ville', VilleController::class)
        ->middleware('admin');

    Route::resource('/admin/annonce', AnnonceController::class)
        ->middleware('admin');

    Route::get('/admin/all/annonce', [AnnonceController::class, 'all'])
        ->middleware('admin');

    Route::get('/admin/pending/annonce', [AnnonceController::class, 'pendingAnnonce'])
        ->middleware('admin');
});

Route::get('/admin/annonce', [AnnonceController::class, 'index']);

Route::post('/sign-up', [AuthController::class, 'register']);
Route::post('/sign-in', [AuthController::class, 'login']);
