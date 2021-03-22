<?php

use Illuminate\Support\Facades\Route;
use Iyngaran\Category\Http\Controllers\Api\CategoryController;
use Iyngaran\Category\Http\Controllers\Api\ParentCategoryController;
use Iyngaran\Category\Http\Controllers\Api\ChildCategoryController;
use Iyngaran\Category\Http\Controllers\Api\ShowCategoryController;

Route::group(
    ['prefix' => 'categories', 'as' => 'categories.'],
    function () {
        Route::get('/parent-categories', ParentCategoryController::class)
            ->name('parent-categories');

        Route::get('/child-categories/{category}', ChildCategoryController::class)
            ->name('child-categories');

        Route::get('/slug/{category:slug}', ShowCategoryController::class)
            ->name('show.by.slug');

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
