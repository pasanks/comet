<?php

namespace Pasanks\Comet\Tests;

use Mockery as m;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Pasanks\Comet\CometServiceProvider;

abstract class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        m::close();
    }

    protected function getPackageProviders($app)
    {
        return [CometServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * Check for given files' existance and delete if found.
     *
     * @param string $file
     *
     * @return void
     */
    protected function deleteFile(string $file): void
    {
        if (file_exists($file)) {
            \unlink($file);
        }
    }
}
