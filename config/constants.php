<?php
return [
    'department_count' => 6,

    'minimum_limit' => [
        'account_type' => 3,
        'learning_video' => 0,
        'trading_option' => 4,//fixed
        'testimonial' => 3,
        'legal_document' => 4,
        'faqs' => 5,
        'payment_method' => 4,
        'white_label' => 6,

        'data_list___marketplace__forex' => 4,
        'data_list___marketplace__indices' => 4,
        'data_list___marketplace__shares' => 4,
        'data_list___marketplace__commodities_energies' => 4,

        'data_list___partner__affiliate' => 5,
        'data_list___support_about_us__section5' => 8,//galactic gains | only editable | fixed
    ],
    'maximum_limit' => [
        'account_type' => 6,
        'learning_video' => 6,
        'trading_option' => 4,//fixed
        'testimonial' => 6,
        'legal_document' => 12,
        'faqs' => 15,
        'payment_method' => 8,
        'white_label' => 12,

        'data_list___marketplace__forex' => 8,
        'data_list___marketplace__indices' => 8,
        'data_list___marketplace__shares' => 8,
        'data_list___marketplace__commodities_energies' => 8,

        'data_list___partner__affiliate' => 10,
        'data_list___support_about_us__section5' => 8,//galactic gains | only editable | fixed
    ],

    'character_limits' => [
        'faq_title' => 100,
        'faq_description' => 500,
        'email' => 100,
        'address' => 100,
        'contact_number' => 100,
        'ticket_number' => 100,
        'trade_number' => 100,
        'password' => 250,
        'data_list' => 75,
        'button_text' => 50,
        'button_link' => 255,
        'short_title' => 25,
        'pre_title' => 100,
        'main_title' => 100,
        'sub_title' => 100,
        'pre_description' => 500,
        'long_pre_description' => 900,
        'post_description' => 500,
        'short_description' => 300,
        'normal_description' => 1000,
        'long_description' => 1600,
        'extra_long_description' => 5000,
        'account_type_table_field' => 50,
        'legal_document_name_field' => 40,
    ],
    'validation' => [
        'users' => [
            'name' => [
                'size_max' => 255,
            ],
            'email' => [
                'size_max' => 255,
            ],
            'password' => [
                'size_min' => 6,
            ],
            'remember_token' => [
                'size_max' => 100,
            ]
        ],
        'role' => [
            'name' => [
                'size_max' => 10,
            ],
        ],
        'permissions' => [
            'name' => [
                'size_max' => 20,
            ],
        ],

    ]
];
