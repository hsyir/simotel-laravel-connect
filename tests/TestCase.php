<?php

namespace Hsy\LaraSimotel\Tests;


use Hsy\LaraSimotel\LaraSimotelServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Bootstrap any service providers here.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LaraSimotelServiceProvider::class,
        ];
    }



    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('app.locale', 'fa');
        $app['config']->set('app.timezone', 'Asia/tehran');
        $app['config']->set('database.default', 'testdb');
        $app['config']->set('database.connections.testdb', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
        ]);
    }
}
