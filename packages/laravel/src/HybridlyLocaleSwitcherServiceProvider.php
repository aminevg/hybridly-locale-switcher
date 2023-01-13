<?php

namespace Aminevg\HybridlyLocaleSwitcher;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Aminevg\HybridlyLocaleSwitcher\Commands\HybridlyLocaleSwitcherCommand;

class HybridlyLocaleSwitcherServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('hybridly-locale-switcher')
            ->hasConfigFile()
            ->hasCommand(HybridlyLocaleSwitcherCommand::class);
    }
}
