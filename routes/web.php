<?php

use App\Http\Controllers\AdminController;
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
Route::get('/loginadmin', [LoginsAdminController::class, 'index'])->name('loginadmin');

Route::post('/register', [LoginsController::class, 'create'])->name('register');
Route::post('/registeradmin', [LoginsAdminController::class, 'create'])->name('registeradmin');

Route::post('/loginadminnew', [LoginsAdminController::class, 'loginadmin'])->name('loginadminnew');
Route::get('/dashboardadmin', [LoginsAdminController::class, 'dashboardadmin'])->name('dashboardadmin')->middleware('checkAdminRole');

Route::post('/loginuser', [LoginsController::class, 'login'])->name('loginuser');
Route::get('/dashboard', [LoginsController::class, 'dashboard'])->name('dashboard');


Route::middleware('checkAdminRole')->group(function () {

    
    // web.php
    // web.php
    Route::get('/listuser', [AdminController::class, 'index'])->name('listuser');


    Route::get('/admin/listusers/{id}', [AdminController::class, 'show']); // Xem chi tiết
    Route::middleware(['CheckAdminFull'])->group(function () {
        Route::post('users', [AdminController::class, 'store']); // Thêm mới
        Route::put('users/{id}', [AdminController::class, 'update']); // Chỉnh sửa  
        Route::delete('users/{id}', [AdminController::class, 'destroy']);
    });
});




 






    


// Route::get('/home', [LoginsController::class, 'index1']);



// Route::post('/admin', [LoginsController::class, 'login'])->name('loginuser');
