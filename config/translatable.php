<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Locale
    |--------------------------------------------------------------------------
    |
    | This is the default locale you want to use for your application.
    | The locale will be used when there is no locale set in the URL.
    |
    */
    'default_locale' => 'ka',

    /*
    |--------------------------------------------------------------------------
    | Supported Locales
    |--------------------------------------------------------------------------
    |
    | These are the locales that your application supports.
    |
    */
    'supported_locales' => [
        'ka' => [
            'name' => 'Georgian',
            'script' => 'Geor',
            'native' => 'ქართული',
            'regional' => 'ka_GE',
        ],
        'en' => [
            'name' => 'English',
            'script' => 'Latn',
            'native' => 'English',
            'regional' => 'en_GB',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Use fallback
    |--------------------------------------------------------------------------
    |
    | Determine if fallback locales are returned by default or not. To add
    | more flexibility and configure this option per "translatable"
    | instance, this value will be overridden by the property
    | $useTranslationFallback when defined
    |
    */
    'use_fallback' => true,

    /*
    |--------------------------------------------------------------------------
    | Fallback Locale
    |--------------------------------------------------------------------------
    |
    | A fallback locale is the locale being used to return a translation
    | when the requested translation is not existing. To disable it
    | set it to false.
    |
    | WARNING: This option is deprecated, use fallback_locale instead.
    |
    */
    'fallback_locale' => 'ka',

    /*
    |--------------------------------------------------------------------------
    | Translation Suffix
    |--------------------------------------------------------------------------
    |
    | Defines the default 'Translation' class suffix. For example, if
    | you want to use CountryTrans instead of CountryTranslation
    | application, set this to 'Trans'.
    |
    */
    'translation_suffix' => 'Translation',

    /*
    |--------------------------------------------------------------------------
    | Locale key
    |--------------------------------------------------------------------------
    |
    | Defines the 'locale' field name, which is used by the
    | translation model. This will be the name of the field.
    |
    */
    'locale_key' => 'locale',

    /*
    |--------------------------------------------------------------------------
    | Always load translations when converting to array
    |--------------------------------------------------------------------------
    | Setting this to false will have a performance improvement but will
    | not return the translations when using toArray(), unless the
    | translations relationship is explicitly loaded. On the other hand, setting
    | it to true will always load the translations.
    |
    */
    'to_array_always_loads_translations' => true,

    /*
    |--------------------------------------------------------------------------
    | Translation Model Namespace
    |--------------------------------------------------------------------------
    |
    | Defines the default 'Translation' class namespace. For example, if
    | you want to use App\Translations\CountryTranslation instead of App\CountryTranslation
    | set this to 'App\Translations'.
    |
    */
    'translation_model_namespace' => null,

    /*
    |--------------------------------------------------------------------------
    | Translation Scopes
    |--------------------------------------------------------------------------
    |
    | Set here the scopes you want to automatically load on every
    | Translatable model. You can also override this at the model
    | level.
    |
    */
    'translation_scopes' => [
        \Spatie\Translatable\Scopes\IsCurrentLocale::class,
    ],
]; 