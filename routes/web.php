<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\UserController;
>>>>>>> form-controller
use App\Http\Controllers\ProfileController;

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

<<<<<<< HEAD
Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('/profile/{nama}/{kelas}/{npm}',
[ProfileController::class, 'profile']);
=======
Route::get('/user/profile', [UserController::class,
'profile']);

Route::get('/profile/{nama}/{kelas}/{npm}',
[ProfileController::class, 'profile']);

Route::get('/user/create', [UserController::class,
'create']);

Route::post('/user/store', [UserController::class,
'store'])->name('user.store');
>>>>>>> form-controller
