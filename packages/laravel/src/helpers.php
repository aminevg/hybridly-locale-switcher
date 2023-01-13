<?php

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
