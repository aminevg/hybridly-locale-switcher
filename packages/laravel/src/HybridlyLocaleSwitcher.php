<?php

namespace Aminevg\HybridlyLocaleSwitcher;

use Illuminate\Http\Request;

class HybridlyLocaleSwitcher
{
    public function persistLocale(string $locale): void
    {
        if (config('hybridly-locale-switcher.store') !== 'session') {
            // No support for stores other than session for now
            return;
        }

        session()->put(config('hybridly-locale-switcher.session.session_key'), $locale);
    }

    /**
     * Get all defined locales for this application.
     * https://github.com/hybridly/hybridly/blob/v0.0.1-alpha.18/packages/laravel/src/Commands/I18nCommand.php#L70
     */
    private function getLocales(): array
    {
        if (! $files = scandir(config('hybridly.i18n.lang_path'))) {
            return [];
        }

        return collect($files)
          ->filter(fn ($file) => ! \in_array($file, ['.', '..'], true))
          ->map(fn ($file) => str($file)->beforeLast('.')->toString())
          ->unique()
          ->values()
          ->all();
    }

    public function getPreferredLocale(Request $request = null): string
    {
        $request ??= request();
        return $request->getPreferredLanguage($this->getLocales()) ?? $request->getLocale();
    }
}
