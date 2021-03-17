<?php

namespace Iyngaran\Category\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as Orchestra;
use Iyngaran\Category\CategoryServiceProvider;

class TestCase extends Orchestra
{
    use WithFaker;


    public function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Iyngaran\\Category\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            CategoryServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        include_once __DIR__.'/../database/migrations/create_laravel_categories_table.php.stub';
        (new \CreateLaravelCategoriesTable())->up();

        include_once __DIR__.'/../tests/migrations/2014_10_12_000000_create_test_tables.php';
        (new \CreateTestTables())->up();
    }
}
