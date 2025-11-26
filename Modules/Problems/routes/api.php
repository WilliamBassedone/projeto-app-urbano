<?php

use Illuminate\Support\Facades\Route;
use Modules\Problems\Http\Controllers\ProblemsController;

Route::prefix('v1')->group(function () {
    Route::apiResource('problems', ProblemsController::class)->names('problems');
});
