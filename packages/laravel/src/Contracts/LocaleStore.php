<?php

namespace Aminevg\HybridlyLocaleSwitcher\Contracts;

interface LocaleStore
{
    /**
     * Get the current locale from the store, or set it to a fallback value.
     * @param callable(): string $fallback
     */
    public function remember(callable $fallback): string;

    /**
     * Put the passed locale in the store.
     */
    public function put(string $locale): void;
}
