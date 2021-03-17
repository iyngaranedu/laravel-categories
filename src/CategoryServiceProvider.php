<?php

namespace Iyngaran\Category;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Iyngaran\Category\Commands\CategoryCommand;
use Illuminate\Support\Facades\Route;

class CategoryServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-categories')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_categories_table')
            ->hasCommand(CategoryCommand::class);

        $this->registerWebRoutes();
        $this->registerApiRoutes();
    }

    private function registerWebRoutes()
    {
        Route::group(
            [
                'prefix' => "/".config('laravel-categories.url_prefix', 'app'),
                'middleware' => "web",
            ],
            function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
            }
        );
    }

    private function registerApiRoutes()
    {
        Route::group(
            [
                'prefix' => "/api/".config('laravel-categories.url_prefix', 'app'),
                'middleware' => "api",
            ],
            function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
            }
        );
    }

}
