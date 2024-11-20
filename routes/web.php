<?php

use App\Http\Controllers\backend\DesignationController;
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

// Admin Dashboard

// Route::get('/admin/dashboard', function () {
//     return view('backend.admin_dashboard');
// })->middleware(['auth:admin', 'verified'])->name('admin_dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin guard
Route::middleware('guest:admin')->prefix('admin')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'check_user']);

});

Route::middleware('auth:admin')->prefix('admin')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'logout'])->name('admin.logout');
    Route::view('/dashboard','backend.admin_dashboard');
    Route::resource('/designation', DesignationController::class);

});

// Teacher guard
Route::middleware('guest:teacher')->prefix('teacher')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Teacher\LoginController::class, 'login'])->name('teacher.login');
    Route::post('login', [App\Http\Controllers\Auth\Teacher\LoginController::class, 'check_user']);

});

Route::middleware('auth:teacher')->prefix('teacher')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Teacher\LoginController::class, 'logout'])->name('teacher.logout');
    Route::view('/dashboard','backend.teacher_dashboard');
    

});
