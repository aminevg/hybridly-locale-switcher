<?php

use Aminevg\HybridlyLocaleSwitcher\Contracts\LocaleStore;
use Aminevg\HybridlyLocaleSwitcher\HybridlyLocaleSwitcher;

if (!function_exists('hybridly_locale_switcher')) {
    /**
     * Gets the hybridly locale switcher instance.
     */
    function hybridly_locale_switcher(): HybridlyLocaleSwitcher
    {
        /** @var HybridlyLocaleSwitcher */
        $instance = resolve(HybridlyLocaleSwitcher::class);
        return $instance;
    }
}

if (!function_exists('hybridly_locale_store')) {
    /**
     * Gets the hybridly locale switcher instance.
     */
    function hybridly_locale_store(): LocaleStore
    {
        /** @var LocaleStore */
        $instance = resolve('hybridly_locale_switcher.store');
        return $instance;
    }
}
