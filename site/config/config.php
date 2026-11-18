<?php

return [
    // Turned on per domain, see config.martinaholenstein.ch.php
    'analytics' => false,
    'tobimori.seo.robots.index' => false,

    // Index every published page, not only listed ones (projects/about may be unlisted)
    'tobimori.seo.robots.followPageStatus' => false,
    // "projects" only redirects to home
    'tobimori.seo.sitemap.excludeTemplates' => ['error', 'projects'],

    // Staticache writes finished pages to public_html/static, where Apache serves
    // them without PHP (see public_html/.htaccess). Each server has one domain,
    // so there's no per-domain folder.
    'cache' => [
        'pages' => [
            'active' => true,
            'type' => 'static',
            'root' => dirname(__DIR__, 2) . '/public_html/static',
            'prefix' => null,
        ],
    ],

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
