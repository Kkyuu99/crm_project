<?php

return [
    /*
    |----------------------------------------------------------------------
    | Application Name
    |----------------------------------------------------------------------
    */
    'name' => env('APP_NAME', 'Laravel'),

    /*
    |----------------------------------------------------------------------
    | Application Environment
    |----------------------------------------------------------------------
    */
    'env' => env('APP_ENV', 'local'),

    /*
    |----------------------------------------------------------------------
    | Application Debug Mode
    |----------------------------------------------------------------------
    */
    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |----------------------------------------------------------------------
    | Application URL
    |----------------------------------------------------------------------
    */
    'url' => env('APP_URL', 'http://localhost'),

    /*
    |----------------------------------------------------------------------
    | Application Timezone
    |----------------------------------------------------------------------
    */
    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |----------------------------------------------------------------------
    | Application Locale Configuration
    |----------------------------------------------------------------------
    */
    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |----------------------------------------------------------------------
    | Encryption Key
    |----------------------------------------------------------------------
    */
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),
    'previous_keys' => [
        ...array_filter(explode(',', env('APP_PREVIOUS_KEYS', '')))
    ],

    /*
    |----------------------------------------------------------------------
    | Maintenance Mode Driver
    |----------------------------------------------------------------------
    */
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],
];
