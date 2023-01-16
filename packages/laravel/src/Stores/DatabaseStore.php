<?php

namespace Aminevg\HybridlyLocaleSwitcher\Stores;

use Aminevg\HybridlyLocaleSwitcher\Contracts\LocaleStore;
use Aminevg\HybridlyLocaleSwitcher\Models\UserLocale;

class DatabaseStore implements LocaleStore
{
    public function remember(callable $fallback): string
    {
        $user = auth()->user();
        if (!$user) {
            return $fallback();
        }
        return UserLocale::firstOrCreate(
            ['user_id' => $user->getAuthIdentifier(), 'user_type' => get_class($user)],
            ['locale' => $fallback()],
        )->locale;
    }

    public function put(string $locale): void
    {
        $user = auth()->user();
        if (!$user) {
            return;
        }
        UserLocale::updateOrCreate(
            ['user_id' => $user->getAuthIdentifier(), 'user_type' => get_class($user)],
            ['locale' => $locale],
        );
    }
}
