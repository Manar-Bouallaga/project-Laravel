<?php

use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\PresenceController;
use App\Models\Administrateur;
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
    return view('Home');
});

Route::resource('administrateurs', AdministrateurController::class);
Route::resource('directeurs', DirecteurController::class);
Route::resource('ecoles', EcoleController::class);
Route::resource('presences', PresenceController::class);



