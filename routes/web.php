<?php

use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ReunionController;
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

<<<<<<< HEAD

=======
// Route::get('/', function () {
//     return view('Home');
// });
>>>>>>> 680da5cb24e36b8caa0a3c193a198e1c7358e540

Route::resource('administrateurs', AdministrateurController::class);
Route::resource('directeurs', DirecteurController::class);
Route::resource('ecoles', EcoleController::class);
Route::resource('presences', PresenceController::class);
<<<<<<< HEAD
Route::resource('reunions', ReunionController::class);
route::get("confirm_presence/{qrCode}");
// iben taymia el malakiya
// Route::get('/form-after-scan', 'ReunionController@showFormAfterScan')->name('form-after-scan')
;
// Route::get('/form-after-scan', 'DirecteurController@show')->name('form-after-scan');
=======
Route::get('/login',[AdministrateurController::class,'login'])->name('login');
Route::post('/login',[AdministrateurController::class,'loginPost'])->name('login');

>>>>>>> 680da5cb24e36b8caa0a3c193a198e1c7358e540
