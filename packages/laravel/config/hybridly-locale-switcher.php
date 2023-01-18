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

    'store' => env(
        'HYBRIDLY_LOCALE_SWITCHER_STORE',
        \Aminevg\HybridlyLocaleSwitcher\Stores\SessionStore::class,
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Store Options
    |--------------------------------------------------------------------------
    |
    | You may set the session key used to store the current locale.
    */

    'session' => [
        'session_key' => env('HYBRIDLY_LOCALE_SWITCHER_SESSION_KEY', 'hybridly_locale_switcher_session_key'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Database Store Options
    |--------------------------------------------------------------------------
    |
    | You can specify the name of the table holding locales for each user.
    */

    'database' => [
        'table_name' => env('HYBRIDLY_LOCALE_SWITCHER_TABLE_NAME', 'user_locales'),
    ],
];
