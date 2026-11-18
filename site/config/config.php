<?php

return [
    // Turned on per domain, see config.martinaholenstein.ch.php
    'analytics' => false,
    'tobimori.seo.robots.index' => false,

    // Index every published page, not only listed ones (projects/about may be unlisted)
    'tobimori.seo.robots.followPageStatus' => false,
    // "projects" only redirects to home
    'tobimori.seo.sitemap.excludeTemplates' => ['error', 'projects'],

    'panel' => [
        'favicon' => [
            [
                'rel' => 'apple-touch-icon',
                'type' => 'image/png',
                'href' => '/favicon/apple-touch-icon.png',
            ],
            [
                'rel' => 'icon',
                'type' => 'image/png',
                'sizes' => '32x32',
                'href' => '/favicon/favicon-32x32.png',
            ],
            [
                'rel' => 'icon',
                'type' => 'image/x-icon',
                'href' => '/favicon/favicon.ico',
            ],
        ],
    ],
];
