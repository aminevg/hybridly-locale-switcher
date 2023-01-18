<?php

namespace Aminevg\HybridlyLocaleSwitcher;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Aminevg\HybridlyLocaleSwitcher\Commands\HybridlyLocaleSwitcherCommand;
use Aminevg\HybridlyLocaleSwitcher\Stores\DatabaseStore;
use Aminevg\HybridlyLocaleSwitcher\Stores\SessionStore;
use Exception;

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
            ->hasMigration('create_user_locales_table')
            ->hasCommand(HybridlyLocaleSwitcherCommand::class);
    }

    public function registeringPackage(): void
    {
        $this->app->singleton(HybridlyLocaleSwitcher::class);

        $this->app->singleton(
            'hybridly_locale_switcher.store',
            fn ($container) => $container->build($this->getStoreClass())
        );
    }

    private function getStoreClass(): string
    {
        /** @var string|null */
        $store = config('hybridly-locale-switcher.store');
        if ($store === 'session') {
            return SessionStore::class;
        }
        if ($store === 'database') {
            return DatabaseStore::class;
        }
        throw new Exception("Store [$store] not supported.");
    }
}
