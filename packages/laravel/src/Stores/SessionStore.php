<?php

namespace Aminevg\HybridlyLocaleSwitcher\Stores;

use Aminevg\HybridlyLocaleSwitcher\Contracts\LocaleStore;
use Closure;
use Illuminate\Session\Store as SessionStoreClass;
use Illuminate\Session\SessionManager;

class SessionStore implements LocaleStore
{
    protected SessionStoreClass|SessionManager $session;

    protected string $session_key;

    public function __construct(SessionStoreClass|SessionManager $session = null)
    {
        $this->session = $session ?? session();

        $this->session_key = config('hybridly-locale-switcher.session.session_key');
    }

    public function remember(callable $fallback): string
    {
        return $this->session->remember(
            $this->session_key,
            Closure::fromCallable($fallback),
        );
    }

    public function put(string $locale): void
    {
        $this->session->put($this->session_key, $locale);
    }
}
