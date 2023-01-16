<?php

namespace Aminevg\HybridlyLocaleSwitcher\Tests;

use Aminevg\HybridlyLocaleSwitcher\HybridlyLocaleSwitcherServiceProvider;
use Aminevg\HybridlyLocaleSwitcher\Stores\DatabaseStore;

trait UsesDatabaseStore
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app)
    {
        $app['config']->set('hybridly-locale-switcher', [
            'store' => DatabaseStore::class,
        ]);
        return [
            HybridlyLocaleSwitcherServiceProvider::class,
        ];
    }
}
