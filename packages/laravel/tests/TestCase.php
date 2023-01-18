<?php

namespace Aminevg\HybridlyLocaleSwitcher\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_user_locales_table.php.stub';
        $migration->up();
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }

    protected function defineEnvironment($app)
    {
        $app['config']->set('hybridly', [
            'i18n' => ['lang_path' => 'tests/lang']
        ]);
        $app['config']->set('hybridly_locale_switcher', [
            'database' => [
                'table_name' => 'user_locales',
            ],
        ]);
    }
}
