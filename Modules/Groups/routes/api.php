<?php

use Illuminate\Support\Facades\Route;
use Modules\Groups\Http\Controllers\GroupController;

// Sem auth por enquanto (Users/Login depois)
Route::prefix('v1/groups')->group(function () {
    Route::get('/',          [GroupController::class, 'index']);
    Route::get('/{group}',   [GroupController::class, 'show']);
    Route::post('/',         [GroupController::class, 'store']);
    Route::put('/{group}',   [GroupController::class, 'update']);
    Route::patch('/{group}', [GroupController::class, 'update']);
    Route::delete('/{group}', [GroupController::class, 'destroy']);
});

