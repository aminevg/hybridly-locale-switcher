<?php

namespace Aminevg\HybridlyLocaleSwitcher\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Aminevg\HybridlyLocaleSwitcher\HybridlyLocaleSwitcher
 */
class HybridlyLocaleSwitcher extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Aminevg\HybridlyLocaleSwitcher\HybridlyLocaleSwitcher::class;
    }
}
