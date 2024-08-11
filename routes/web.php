<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Define admin-specific routes here
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


// Registration route
Route::get('/registration-complete', function () {
    return view('auth.registration_complete');
})->name('registration.complete')->middleware('auth');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//Store Route
Route::middleware('auth')->group(function () {
    Route::resource('stores', StoreController::class);
});
Route::get('/dashboard', [StoreController::class, 'dashboard'])->name('dashboard');

// User Route 
Route::resource('users', UserController::class);
//Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');


// Report route
Route::resource('stores.reports', ReportController::class);
Route::get('/stores/{store}/reports', [ReportController::class, 'index'])->name('stores.reports.index');

// Password reset routes (if needed)
// Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');