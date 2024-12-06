<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::prefix('car')->group(function () {
    route::get('/', [CarController::class, 'index']);
    route::get('/{id}', [CarController::class, 'show']);
    route::post('/', [CarController::class, 'store']);
    route::put('/{id}', [CarController::class, 'update']);
    route::delete('/{id}', [CarController::class, 'destroy']);
});
