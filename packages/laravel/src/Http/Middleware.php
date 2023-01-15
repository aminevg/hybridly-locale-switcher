<?php

namespace Aminevg\HybridlyLocaleSwitcher\Http;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Middleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = hybridly_locale_store()->remember(
            fn () => hybridly_locale_switcher()->getPreferredLocale($request),
        );
        app()->setLocale($locale);
        hybridly()->share('hybridlyLocaleSwitcher.currentLocale', $locale);

        return $next($request);
    }
}
