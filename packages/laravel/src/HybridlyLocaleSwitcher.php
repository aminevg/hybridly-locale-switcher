<?php

namespace Aminevg\HybridlyLocaleSwitcher;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HybridlyLocaleSwitcher
{
    public function persistLocale(string $locale): void
    {
        hybridly_locale_store()->put($locale);
    }

    /**
     * Get all defined locales for this application.
     * https://github.com/hybridly/hybridly/blob/v0.0.1-alpha.18/packages/laravel/src/Commands/I18nCommand.php#L70
     * @return array<string>
     */
    private function getLocales(): array
    {
        /** @var array<string>|false */
        $files = scandir(config('hybridly.i18n.lang_path'));
        if (!$files) {
            return [];
        }

        return collect($files)
          ->filter(fn ($file) => ! in_array($file, ['.', '..'], true))
          ->map(fn ($file) => Str::of($file)->beforeLast('.')->toString())
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
