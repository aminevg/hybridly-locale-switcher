<?php

namespace Aminevg\HybridlyLocaleSwitcher\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Aminevg\\HybridlyLocaleSwitcher\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_hybridly-locale-switcher_table.php.stub';
        $migration->up();
        */
    }

    protected function defineEnvironment($app)
    {
        $app['config']->set('hybridly', [
            'i18n' => ['lang_path' => 'tests/lang']
        ]);
    }
}
