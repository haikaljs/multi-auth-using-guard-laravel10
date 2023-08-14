<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/dashboard-user', [WebsiteController::class, 'dashboard_user'])->name('dashboard-user')->middleware('auth');

Route::get('/login', [WebsiteController::class, 'login'])->name('login');

Route::post('/login-submit', [WebsiteController::class, 'login_submit'])->name('login-submit');

Route::get('/logout', [WebsiteController::class, 'logout'])->name('logout');

Route::get('/register', [WebsiteController::class, 'register'])->name('register');

Route::post('/register-submit', [WebsiteController::class, 'register_submit'])->name('register-submit');

Route::get('/register/verify/{token}/{email}', [WebsiteController::class, 'register_verify']);


Route::get('/forget-password', [WebsiteController::class, 'forget_password'])->name('forget-password');

Route::post('/forget-password-submit', [WebsiteController::class, 'forget_password_submit'])->name('forget-password-submit');

Route::get('/reset-password/{token}/{email}', [WebsiteController::class, 'reset_password']);

Route::post('/reset-password-submit', [WebsiteController::class, 'reset_password_submit'])->name('reset-password-submit');

// Admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin-login');

Route::post('/admin/login-submit', [AdminController::class, 'login_submit'])->name('admin-login-submit');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard')->middleware(['auth', 'admin']);

Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin-settings')->middleware('admin');

Route::get('/admin/logout', [WebsiteController::class, 'logout'])->name('admin-logout');

