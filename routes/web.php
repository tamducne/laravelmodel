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
Route::get('/loginadmin', [LoginsAdminController::class, 'index'])->name('loginadmin');

Route::post('/register', [LoginsController::class, 'create'])->name('register');
Route::post('/registeradmin', [LoginsAdminController::class, 'create'])->name('registeradmin');

Route::post('/loginadminnew', [LoginsAdminController::class,'loginadmin'])->name('loginadminnew');
Route::get('/dashboardadmin', [LoginsAdminController::class,'dashboardadmin'])->name('dashboardadmin')->middleware('checkAdminRole');

Route::post('/loginuser', [LoginsController::class,'login'])->name('loginuser');
Route::get('/dashboard', [LoginsController::class,'dashboard'])->name('dashboard');



// Route::get('/dashboardadmin/users', [AdminController::class, 'index']); // Xem danh sách
// Route::get('/admin/users/{id}', [AdminController::class, 'show']); // Xem chi tiết
// Route::post('/admin/users', [AdminController::class, 'store']); // Thêm mới
// Route::put('/admin/users/{id}', [AdminController::class, 'update']); // Chỉnh sửa
// Route::delete('/admin/users/{id}', [AdminController::class, 'destroy']); // Xóa









    


// Route::get('/home', [LoginsController::class, 'index1']);



// Route::post('/admin', [LoginsController::class, 'login'])->name('loginuser');






