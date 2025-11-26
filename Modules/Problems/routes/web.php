<?php

use Illuminate\Support\Facades\Route;
use Modules\Problems\Http\Controllers\ProblemsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('problems', ProblemsController::class)->names('problems');
});
