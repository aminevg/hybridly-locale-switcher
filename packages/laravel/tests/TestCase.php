<?php

namespace Aminevg\HybridlyLocaleSwitcher\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Aminevg\HybridlyLocaleSwitcher\HybridlyLocaleSwitcherServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Aminevg\\HybridlyLocaleSwitcher\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            HybridlyLocaleSwitcherServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_hybridly-locale-switcher_table.php.stub';
        $migration->up();
        */
    }
}
