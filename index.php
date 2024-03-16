<?php declare(strict_types=1);

use Kirby\Cms\App;

App::plugin('kensho/htmldoc', [
    'options' => [
        'contentTypes' => [
            'htm',
            'html',
        ],
        'config' => [
            'minify' => [
                'quotes' => false,
                'urls'   => [
                    'relative' => false,
                    'parent'   => false,
                ],
            ],
        ],
    ],
    'hooks' => [
        'page.render:after' => require __DIR__ . '/hooks/page/render/after.php',
    ],
]);
