<?php

return [
    'coolTagsX' => [
        'file' => 'cooltagsx',
        'description' => '',
        'events' => [
            'OnMODXInit' => [],
            'OnWebPagePrerender' => [],
            /* TicketComment */
            'OnBeforeCommentSave' => [],
            'OnCommentSave' => [],
            'OnCommentPublish' => [],
            'OnCommentUnpublish' => [],
            'OnCommentDelete' => [],
            'OnCommentUndelete' => [],
        ],
    ],
];