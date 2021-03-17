<?php

use Illuminate\Support\Facades\Route;
use Iyngaran\Category\Http\Controllers\Api\CategoryController;

Route::group(
    ['prefix' => 'categories', 'as' => 'categories.'],
    function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('index');

        Route::get('/{category}', [CategoryController::class, 'show'])
            ->name('show');

        Route::post('/', [CategoryController::class, 'store'])
            ->name('store');

        Route::put('/{category}', [CategoryController::class, 'update'])
            ->name('update');

        Route::delete('/{category}', [CategoryController::class, 'destroy'])
            ->name('delete');
    }
);
