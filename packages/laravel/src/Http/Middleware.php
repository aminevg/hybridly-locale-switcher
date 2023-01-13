<?php

namespace Aminevg\HybridlyLocaleSwitcher\Http;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Middleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (config('hybridly-locale-switcher.store') !== 'session') {
            // No support for stores other than session for now
            return $next($request);
        }

        /** @var string */
        $locale = session()->remember(
            config('hybridly-locale-switcher.session.session_key'),
            fn () => hybridly_locale_switcher()->getPreferredLocale($request),
        );
        app()->setLocale($locale);
        hybridly()->share('hybridlyLocaleSwitcher.currentLocale', $locale);

        return $next($request);
    }
}
