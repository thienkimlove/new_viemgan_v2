<?php

return [
    'contact_status' => [
        0 => 'Vừa tiếp nhận',
        1 => 'Đang xử lý',
        2 => 'Đã hoàn thành'
    ],

    'sitemap' => ['categories', 'posts', 'questions', 'videos'],
    'content' => [

        'posts' => [
            'name' => 'Bài viết',
            'modules' => [
                'display_in_index_category' => 'Show On Index Category',
                'display_in_index_top' => 'Show On Index Top',
                'index_right' => 'Right Index',
                'index_right_share' => 'Share Right Index',
            ]
        ],

        'categories' => [
            'name' => 'Chuyen muc',
            'modules' => [
                'index_block_1' => 'Block 1 Index',
                'index_block_2' => 'Block 2 Index',
                'index_block_3' => 'Block 3 Index',
                'index_block_4' => 'Block 4 Index',
            ]
        ],
        'videos' => [
            'name' => 'Video',
            'modules' => [
                'index_right' => 'Right Index',
            ]
        ],
        'questions' => [
            'name' => 'Question',
            'modules' => [
                'index_right' => 'Right Index',
            ]
        ],

        'contacts' => [
            'name' => 'Contacts',
            'modules' => [
                'index_right' => 'Right Index',
            ]
        ]


        //add more content here...
    ],
    'item_per_page' => 10
];