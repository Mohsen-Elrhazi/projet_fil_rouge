<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Faker\Provider\HtmlLorem;
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

Route::get('/register', [AuthController::class, 'registerForm'])->name('register'); 
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout']);


Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// routes pour dashboard admin
Route::middleware(['IsAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users');
    Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/account-settings', [AdminDashboardController::class, 'accountSettings'])->name('admin.account');
    Route::get('/admin/users/{id}', [UserController::class, 'activerOrDesactiver'])->name('admin.users.activerOrDesactiver');
    Route::put('/admin/profile/update', [ProfileController::class, 'update']);
    Route::put('/admin/account-settings/update',[AccountSettingsController::class,'update']);   
});

    



// 
Route::put('/user/profile/update', [ProfileController::class, 'update']);
Route::put('/user/account-settings/update',[AccountSettingsController::class,'update']); 

// les routs pour application
Route::middleware(['CheckAuth'])->group(function () {
Route::prefix('app')->name('app.')->group(function () {
    // Route::get('/', [HomeController::class, 'home'])->name('home');
    // contacts
    Route::prefix('contacts')->name('contacts.')->group(function () {
        // Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/search', [ContactController::class, 'search'])->name('search');
    });
    
    
    // Chat
    Route::prefix('chat')->name('chat.')->group(function () {
       // Discussions Privées
       Route::prefix('discussions')->name('discussions.')->group(function () {
         Route::get('/', [ChatController::class, 'index'])->name('index');
         Route::get('/show/{id}', [ChatController::class, 'show'])->name('show');
        Route::post('/sendMessage', [ChatController::class, 'sendMessage'])->name('sendMessage');
         Route::delete('/{conversation}', [ChatController::class, 'destroy'])->name('destroy');
        
       });
    });
});
});
    