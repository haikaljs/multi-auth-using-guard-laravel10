<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

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

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/dashboard', [WebsiteController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/login', [WebsiteController::class, 'login'])->name('login');
Route::post('/login-submit', [WebsiteController::class, 'login_submit'])->name('login-submit');
Route::get('/logout', [WebsiteController::class, 'logout'])->name('logout');
Route::get('/register', [WebsiteController::class, 'register'])->name('register');
Route::post('/register-submit', [WebsiteController::class, 'register_submit'])->name('register-submit');
Route::get('/register/verify/{token}/{email}', [WebsiteController::class, 'register_verify']);
Route::get('/forget-password', [WebsiteController::class, 'forget_password'])->name('forget-password');
Route::post('/forget-password-submit', [WebsiteController::class, 'forget_password_submit'])->name('forget-password-submit');
