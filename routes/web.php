<?php

use App\Http\Controllers\AdminController;
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

// Search API Route
Route::get('/api/search', function (Illuminate\Http\Request $request) {
    $query = $request->input('q', '');
    
    if (strlen($query) < 1) {
        return response()->json([]);
    }
    
    $items = \App\Models\Item::where('name', 'LIKE', "%{$query}%")
        ->orWhere('location', 'LIKE', "%{$query}%")
        ->orWhereHas('category', function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })
        ->latest('date_reported')
        ->limit(50)
        ->get();
    
    return response()->json($items);
})->name('search');

// Protected Admin Routes
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/items', [AdminController::class, 'manageItems'])->name('admin.items');
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/admin/categories', [AdminController::class, 'manageCategories'])->name('admin.categories');
    Route::post('/admin/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::put('/admin/categories/{category}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [AdminController::class, 'deleteCategory'])->name('admin.categories.delete');
});
