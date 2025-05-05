<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('register');
});

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::middleware(['CheckAuth'])->group(function () {

Route::get('/profile', [ProfileController::class, 'getProfile'])->name('getProfile'); 
Route::put('/profile/update', [ProfileController::class, 'update']);

Route::get('/account', [AccountController::class, 'getAccount'])->name('getAccount');
Route::put('/Account/update', [AccountController::class, 'update']);


Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::get('/chat/{contact}', [ChatController::class, 'show'])->name('chat.show');
Route::post('/chat/send/{contact}', [ChatController::class, 'sendMessage'])->name('chat.send');

// groups
Route::get('/group', [GroupController::class, 'index'])->name('group.index');
});  

 // admin dashboard
Route::middleware(['CheckAdmin'])->group(function () {
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/admin/users/{id}', [UserController::class, 'activerOrDesactiver'])->name('admin.users.activerOrDesactiver');
});