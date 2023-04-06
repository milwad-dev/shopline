<?php

return [
    'MediaTypeServices' => [
        'image' => [
            'extensions' => [
                'png', 'jpg', 'jpeg',
            ],
            'handler' => Modules\Media\Services\ImageFileService::class,
        ],
        'video' => [
            'extensions' => [
                'avi', 'mp4', 'mkv',
            ],
            'handler' => Modules\Media\Services\VideoFileService::class,
        ],
        'zip' => [
            'extensions' => [
                'zip', 'rar', 'tar', 'pdf',
            ],
            'handler' => Modules\Media\Services\ZipFileService::class,
        ],
    ],
];
