<?php

return [
    'pages' => [
        'index' => [
            'title' => 'სია',
        ],
        'create' => [
            'title' => 'შექმნა',
        ],
        'edit' => [
            'title' => 'რედაქტირება',
        ],
        'view' => [
            'title' => 'ნახვა',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'შექმნა',
            'modal' => [
                'heading' => 'შექმნა',
                'actions' => [
                    'create' => [
                        'label' => 'შექმნა',
                    ],
                ],
            ],
        ],
        'edit' => [
            'label' => '',
        ],
        'delete' => [
            'label' => '',
            'modal' => [
                'heading' => 'წაშლა',
                'description' => 'დარწმუნებული ხართ, რომ გსურთ ამ ჩანაწერის წაშლა?',
                'actions' => [
                    'delete' => [
                        'label' => 'წაშლა',
                    ],
                ],
            ],
        ],
        'view' => [
            'label' => '',
        ],
        'force_delete' => [
            'label' => 'სრულად წაშლა',
            'modal' => [
                'heading' => 'სრულად წაშლა',
                'description' => 'დარწმუნებული ხართ, რომ გსურთ ამ ჩანაწერის სრულად წაშლა?',
                'actions' => [
                    'force_delete' => [
                        'label' => 'სრულად წაშლა',
                    ],
                ],
            ],
        ],
        'restore' => [
            'label' => 'აღდგენა',
            'modal' => [
                'heading' => 'აღდგენა',
                'description' => 'დარწმუნებული ხართ, რომ გსურთ ამ ჩანაწერის აღდგენა?',
                'actions' => [
                    'restore' => [
                        'label' => 'აღდგენა',
                    ],
                ],
            ],
        ],
    ],
    'notifications' => [
        'created' => 'ჩანაწერი წარმატებით შეიქმნა.',
        'saved' => 'ჩანაწერი წარმატებით შეინახა.',
        'deleted' => 'ჩანაწერი წარმატებით წაიშალა.',
        'restored' => 'ჩანაწერი წარმატებით აღდგა.',
    ],
]; 