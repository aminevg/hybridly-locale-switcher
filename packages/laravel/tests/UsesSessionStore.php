<?php

namespace Aminevg\HybridlyLocaleSwitcher\Tests;

use Aminevg\HybridlyLocaleSwitcher\HybridlyLocaleSwitcherServiceProvider;
use Aminevg\HybridlyLocaleSwitcher\Stores\SessionStore;

trait UsesSessionStore
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app)
    {
        $app['config']->set([
            'hybridly-locale-switcher.store' => SessionStore::class,
            'hybridly-locale-switcher.session.session_key' => 'hybridly_locale_switcher_session_key',
        ]);
        return [
            HybridlyLocaleSwitcherServiceProvider::class,
        ];
    }
}
