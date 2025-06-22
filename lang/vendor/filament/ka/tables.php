<?php

return [
    'columns' => [
        'actions' => 'მოქმედებები',
        'created_at' => 'შექმნის თარიღი',
        'updated_at' => 'განახლების თარიღი',
        'deleted_at' => 'წაშლის თარიღი',
    ],
    'filters' => [
        'search' => 'ძიება',
        'select_all' => 'ყველას არჩევა',
        'deselect_all' => 'არჩევის გაუქმება',
    ],
    'bulk_actions' => [
        'delete' => [
            'label' => 'წაშლა',
            'modal' => [
                'heading' => 'წაშლა',
                'description' => 'დარწმუნებული ხართ, რომ გსურთ არჩეული ჩანაწერების წაშლა?',
                'actions' => [
                    'delete' => [
                        'label' => 'წაშლა',
                    ],
                ],
            ],
        ],
    ],
    'empty_state' => [
        'heading' => 'ჩანაწერები არ არის',
        'description' => 'შექმენით პირველი ჩანაწერი.',
    ],
]; 