<?php

// config for Aminevg/HybridlyLocaleSwitcher
return [
    /*
    |--------------------------------------------------------------------------
    | Locale Store
    |--------------------------------------------------------------------------
    |
    | This option defines which locale store to use.
    */

    'store' => env('HYBRIDLY_LOCALE_SWITCHER_STORE', 'session'),

    /*
    |--------------------------------------------------------------------------
    | Session Store Options
    |--------------------------------------------------------------------------
    | You may set the session key used to store the current locale.
    */

    'session' => [
        'session_key' => env('HYBRIDLY_LOCALE_SWTICHER_SESSION_KEY', 'hybridly_locale_switcher_session_key'),
    ],
];
