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
                'label' => 'რედაქტირება',
            ],
            'delete' => [
                'label' => 'წაშლა',
            ],
            'view' => [
                'label' => 'ნახვა',
            ],
        ],
    ],
    'navigation' => [
        'dashboard' => 'დეშბორდი',
        'content_management' => 'კონტენტის მართვა',
        'news' => 'სიახლეები',
        'projects' => 'პროექტები',
        'competitions' => 'კონკურსები',
        'procurements' => 'შესყიდვები',
        'legal_acts' => 'სამართლებრივი აქტები',
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
            'back' => 'უკან',
            'delete' => 'წაშლა',
            'edit' => 'რედაქტირება',
            'view' => 'ნახვა',
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
            'published_at' => 'გამოქვეყნების თარიღი',
            'created_at' => 'შექმნის თარიღი',
            'updated_at' => 'განახლების თარიღი',
            'slug' => 'სლაგი',
            'attachments' => 'დანართები',
            'image' => 'სურათი',
            'file' => 'ფაილი',
            'date' => 'თარიღი',
            'start_date' => 'დაწყების თარიღი',
            'end_date' => 'დასრულების თარიღი',
            'deadline' => 'ვადა',
            'registration_deadline' => 'რეგისტრაციის ვადა',
        ],
    ],
    'tables' => [
        'columns' => [
            'actions' => 'მოქმედებები',
            'created_at' => 'შექმნის თარიღი',
            'updated_at' => 'განახლების თარიღი',
            'published_at' => 'გამოქვეყნების თარიღი',
            'status' => 'სტატუსი',
            'title' => 'სათაური',
            'description' => 'აღწერა',
        ],
        'filters' => [
            'search' => 'ძიება',
            'status' => 'სტატუსი',
            'date' => 'თარიღი',
        ],
        'actions' => [
            'bulk_actions' => 'მასობრივი მოქმედებები',
            'select_all' => 'ყველას არჩევა',
            'deselect_all' => 'ყველას მოხსნა',
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
        'logout' => [
            'title' => 'გასვლა',
        ],
    ],
    'common' => [
        'yes' => 'დიახ',
        'no' => 'არა',
        'active' => 'აქტიური',
        'inactive' => 'არააქტიური',
        'published' => 'გამოქვეყნებული',
        'draft' => 'შავი',
        'pending' => 'მიმდინარე',
        'approved' => 'დამტკიცებული',
        'rejected' => 'უარყოფილი',
        'loading' => 'იტვირთება...',
        'no_records' => 'ჩანაწერები არ არის',
        'confirm_delete' => 'დარწმუნებული ხართ, რომ გსურთ წაშლა?',
        'delete_success' => 'წარმატებით წაიშალა',
        'save_success' => 'წარმატებით შეინახა',
    ],
]; 