<?php

return [
    'pages' => [
        'dashboard' => [
            'label' => 'მთავარი გვერდი',
            'title' => 'მთავარი გვერდი',
        ],
    ],
    'resources' => [
        'title' => 'რესურსები',
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
            ],
            'edit' => [
                'label' => '',
            ],
            'delete' => [
                'label' => '',
            ],
            'view' => [
                'label' => '',
            ],
        ],
    ],
    'navigation' => [
        'dashboard' => 'დეშბორდი',
        'content_management' => 'კონტენტის მართვა',
        'news' => 'სიახლეები',
        'projects' => 'პროექტები',
        'competitions' => 'კონკურსები',
        'vacancies' => 'ვაკანსიები',
        'legislation' => 'კანონმდებლობა',
        'subordinate_institutions' => 'სსიპები',
        'settings' => 'პარამეტრები',
        'users' => 'მომხმარებლები',
    ],
    'forms' => [
        'actions' => [
            'save' => 'შენახვა',
            'cancel' => 'გაუქმება',
            'submit' => 'გაგზავნა',
        ],
        'fields' => [
            'title' => 'სათაური',
            'description' => 'აღწერა',
            'content' => 'კონტენტი',
            'name' => 'სახელი',
            'email' => 'ელ-ფოსტა',
            'phone' => 'ტელეფონი',
            'address' => 'მისამართი',
            'status' => 'სტატუსი',
            'type' => 'ტიპი',
            'is_active' => 'აქტიურია',
            'is_published' => 'გამოქვეყნებულია',
            'created_at' => 'შექმნის თარიღი',
            'updated_at' => 'განახლების თარიღი',
        ],
    ],
    'tables' => [
        'columns' => [
            'actions' => 'მოქმედებები',
            'created_at' => 'შექმნის თარიღი',
            'updated_at' => 'განახლების თარიღი',
        ],
        'filters' => [
            'search' => 'ძიება',
        ],
    ],
    'auth' => [
        'login' => [
            'title' => 'შესვლა',
            'email' => 'ელ-ფოსტა',
            'password' => 'პაროლი',
            'remember_me' => 'დამიმახსოვრე',
            'submit' => 'შესვლა',
        ],
    ],
]; 