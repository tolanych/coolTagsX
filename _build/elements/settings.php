<?php

return [
    'env' => [
        'xtype' => 'textfield',
        'value' => 'default',
        'area' => 'cooltagsx_main',
    ],
    'class' => [
        'xtype' => 'textfield',
        'value' => 'cooltagsx',
        'area' => 'cooltagsx_main',
    ],
    'link' => [
        'xtype' => 'textfield',
        'value' => '<a href="/tags/[[+tags]]/" class="[[+class]]" attr-tags="[[+tags]]">[[+input]]</a>',
        'area' => 'cooltagsx_main',
    ],
    'exclude' => [
        'xtype' => 'textfield',
        'value' => '#example',
        'area' => 'cooltagsx_main',
    ],
    'sug_textarea' => [
        'xtype' => 'textfield',
        'value' => '.content-suggest',
        'area' => 'cooltagsx_main',
    ]
];