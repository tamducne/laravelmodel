<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\LoginsAdminController;

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

Route::get('/login', [LoginsController::class, 'index'])->name('login');

Route::post('/register', [LoginsController::class, 'create'])->name('register');

Route::get('/loginadmin', [LoginsAdminController::class, 'index'])->name('loginadmin');

Route::post('/registeradmin', [LoginsAdminController::class, 'create'])->name('registeradmin');

Route::post('/loginuser', [LoginsController::class,'login'])->name('loginuser');



// Route::get('/home', [LoginsController::class, 'index1']);



// Route::post('/admin', [LoginsController::class, 'login'])->name('loginuser');






