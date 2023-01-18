<?php

namespace Aminevg\HybridlyLocaleSwitcher\Tests;

use Aminevg\HybridlyLocaleSwitcher\HybridlyLocaleSwitcherServiceProvider;

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
        $app['config']->set('hybridly-locale-switcher.store', 'database');
        return [
            HybridlyLocaleSwitcherServiceProvider::class,
        ];
    }
}
