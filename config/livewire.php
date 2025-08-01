<?php

return [

    'class_namespace' => 'App\\Livewire',

    'view_path' => resource_path('views/livewire'),

    'layout' => 'components.layouts.app',

    'lazy_placeholder' => null,

    'temporary_file_upload' => [
        'disk' => 'public',
        'rules' => 'file|mimes:png,jpg,jpeg,gif,svg,pdf,doc,docx|max:20480', // 20MB max
        'directory' => 'livewire-tmp',
        'middleware' => [
            \Illuminate\Session\Middleware\StartSession::class,
        ],
        'preview_mimes' => [
            'image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml',
        ],
        'max_upload_time' => 5,
        'cleanup' => true,
        'preserve_file_names' => true,

    ],

    'render_on_redirect' => false,

    'legacy_model_binding' => false,

    'inject_assets' => true,

    'navigate' => [
        'show_progress_bar' => true,
        'progress_bar_color' => '#2299dd',
    ],

    'inject_morph_markers' => true,

    'pagination_theme' => 'tailwind',
];
