<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ItemApiController;
use App\Http\Controllers\Api\ClaimApiController;
use App\Http\Controllers\Api\ReturnApiController;

Route::prefix('v1')->group(function () {
    // ====== DEBUG ENDPOINT ======
    Route::get('/debug', function () {
        return response()->json([
            'success' => true,
            'message' => 'API is working',
            'sanctum_installed' => true
        ]);
    });

    // ====== DEBUG AUTH ======
    Route::get('/debug-auth', function (Request $request) {
        return response()->json([
            'auth_header' => $request->header('Authorization'),
            'all_headers' => $request->headers->all(),
            'user' => auth('sanctum')->user(),
            'is_authenticated' => auth('sanctum')->check()
        ]);
    });

    // ====== Authentication Routes (Public) ======
    Route::post('/auth/register', [AuthApiController::class, 'register']);
    Route::post('/auth/login', [AuthApiController::class, 'login']);
    Route::get('/items/public/list', [ItemApiController::class, 'publicList']);

    // ====== Protected Routes (Require Authentication) ======
    Route::middleware('auth:sanctum')->group(function () {
        // Auth
        Route::post('/auth/logout', [AuthApiController::class, 'logout']);
        Route::get('/auth/me', [AuthApiController::class, 'me']);

        // Items
        Route::get('/items', [ItemApiController::class, 'index']);
        Route::get('/items/{id}', [ItemApiController::class, 'show']);
        Route::post('/items', [ItemApiController::class, 'store']);
        Route::put('/items/{id}', [ItemApiController::class, 'update']);
        Route::delete('/items/{id}', [ItemApiController::class, 'destroy']);

        // Claims
        Route::get('/claims', [ClaimApiController::class, 'index']);
        Route::get('/claims/{id}', [ClaimApiController::class, 'show']);
        Route::post('/claims', [ClaimApiController::class, 'store']);
        Route::put('/claims/{id}', [ClaimApiController::class, 'update']);

        // Returns
        Route::get('/returns', [ReturnApiController::class, 'index']);
        Route::get('/returns/{id}', [ReturnApiController::class, 'show']);
        Route::post('/returns', [ReturnApiController::class, 'store']);
        Route::put('/returns/{id}', [ReturnApiController::class, 'update']);
    });
});
