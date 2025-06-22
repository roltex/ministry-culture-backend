<?php

return [
    'components' => [
        'actions' => [
            'modal' => [
                'actions' => [
                    'confirm' => [
                        'label' => 'დადასტურება',
                    ],
                    'cancel' => [
                        'label' => 'გაუქმება',
                    ],
                ],
            ],
        ],
        'date_time_picker' => [
            'actions' => [
                'clear' => [
                    'label' => 'გასუფთავება',
                ],
                'set_to_now' => [
                    'label' => 'ახლანდელ დროზე დაყენება',
                ],
            ],
        ],
        'file_upload' => [
            'actions' => [
                'download' => [
                    'label' => 'ჩამოტვირთვა',
                ],
                'open' => [
                    'label' => 'გახსნა',
                ],
                'remove' => [
                    'label' => 'წაშლა',
                ],
            ],
            'errors' => [
                'file_too_large' => 'ფაილი ძალიან დიდია.',
                'file_type_not_allowed' => 'ფაილის ტიპი არ არის დაშვებული.',
                'max_files_exceeded' => 'მაქსიმალური ფაილების რაოდენობა აღემატება.',
            ],
        ],
        'key_value' => [
            'actions' => [
                'add' => [
                    'label' => 'დამატება',
                ],
                'delete' => [
                    'label' => 'წაშლა',
                ],
                'reorder' => [
                    'label' => 'წესრიგის შეცვლა',
                ],
            ],
            'fields' => [
                'key' => [
                    'label' => 'გასაღები',
                    'placeholder' => 'გასაღების სახელი',
                ],
                'value' => [
                    'label' => 'მნიშვნელობა',
                    'placeholder' => 'მნიშვნელობის შეყვანა',
                ],
            ],
        ],
        'markdown_editor' => [
            'toolbar_buttons' => [
                'attach_files' => 'ფაილების დართვა',
                'bold' => 'მუქი',
                'bullet_list' => 'წერტილოვანი სია',
                'code_block' => 'კოდის ბლოკი',
                'edit' => 'რედაქტირება',
                'italic' => 'დახრილი',
                'link' => 'ბმული',
                'ordered_list' => 'ნუმერაციის სია',
                'preview' => 'გადახედვა',
                'strike' => 'ხაზგადასმული',
            ],
        ],
        'repeater' => [
            'actions' => [
                'add' => [
                    'label' => 'დამატება',
                ],
                'delete' => [
                    'label' => 'წაშლა',
                ],
                'reorder' => [
                    'label' => 'წესრიგის შეცვლა',
                ],
            ],
        ],
        'rich_editor' => [
            'actions' => [
                'attach_files' => 'ფაილების დართვა',
                'bold' => 'მუქი',
                'bullet_list' => 'წერტილოვანი სია',
                'code_block' => 'კოდის ბლოკი',
                'h1' => 'სათაური 1',
                'h2' => 'სათაური 2',
                'h3' => 'სათაური 3',
                'italic' => 'დახრილი',
                'link' => 'ბმული',
                'ordered_list' => 'ნუმერაციის სია',
                'quote' => 'ციტატა',
                'redo' => 'გამეორება',
                'strike' => 'ხაზგადასმული',
                'undo' => 'გაუქმება',
            ],
        ],
        'select' => [
            'actions' => [
                'create_option' => [
                    'modal' => [
                        'heading' => 'შექმნა',
                        'actions' => [
                            'create' => [
                                'label' => 'შექმნა',
                            ],
                        ],
                    ],
                ],
            ],
            'boolean' => [
                'true' => 'დიახ',
                'false' => 'არა',
            ],
            'loading_message' => 'იტვირთება...',
            'max_items_message' => 'მხოლოდ :count ჩანაწერი შეიძლება აირჩიოთ.',
            'no_search_results_message' => 'ძიების შედეგი ვერ მოიძებნა.',
            'placeholder' => 'აირჩიეთ ვარიანტი',
            'searching_message' => 'ძიება...',
        ],
        'tags_input' => [
            'actions' => [
                'add' => [
                    'label' => 'დამატება',
                ],
            ],
            'placeholder' => 'ახალი ტეგი',
        ],
        'wizard' => [
            'actions' => [
                'previous_step' => [
                    'label' => 'წინა',
                ],
                'next_step' => [
                    'label' => 'შემდეგი',
                ],
            ],
        ],
    ],
]; 