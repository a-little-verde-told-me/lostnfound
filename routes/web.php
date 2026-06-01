<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ClaimsController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $items = \App\Models\Item::latest('date_reported')->paginate(12);
    return view('home', ['items' => $items]);
})->name('home');

// Info Pages
Route::get('/about', function () {
    return view('info.about');
})->name('about');

Route::get('/contact', function () {
    return view('info.contact');
})->name('contact');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post');

// Report Routes
Route::get('/report/found', [ReportController::class, 'showReportFound'])->name('report.found');
Route::post('/report/found', [ReportController::class, 'storeFoundItem'])->name('report.found.store');
Route::get('/report/lost', [ReportController::class, 'showReportLost'])->name('report.lost');
Route::post('/report/lost', [ReportController::class, 'storeLostItem'])->name('report.lost.store');

// Claims Routes
Route::middleware('auth')->group(function () {
    Route::get('/my-claims', [ClaimsController::class, 'myClaiams'])->name('claims.index');
    Route::get('/claim/create/{itemId}', [ClaimsController::class, 'create'])->name('claim.create');
    Route::post('/claim/store', [ClaimsController::class, 'store'])->name('claim.store');
});

// Protected Admin Routes
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
