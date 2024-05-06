<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\EcoleController;

// use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ReunionController;


// use App\Models\Administrateur;


use App\Http\Controllers\PresenceController;

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
Route::middleware('auth')->group(function () {
    // Route::get('/', function () {
//     return view('Home');
// });
    Route::resource('administrateurs', AdministrateurController::class);
    Route::resource('directeurs', DirecteurController::class);
    Route::resource('ecoles', EcoleController::class);
    Route::resource('administrateurs', AdministrateurController::class);
    Route::resource('directeurs', DirecteurController::class);
    Route::resource('ecoles', EcoleController::class);
    Route::resource('presences', PresenceController::class);
    Route::resource('reunions', ReunionController::class);
    route::get("confirm_presence/{qrCode}");

});
Route::get('/login', [AdministrateurController::class, 'login'])->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/administrateurs', function () {
//     return view('administrateurs.index');
// })->middleware(['auth', 'verified'])->name('administrateurs');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
