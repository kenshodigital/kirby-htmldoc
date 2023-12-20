<?php declare(strict_types=1);

use hexydec\html;
use Kensho\HTMLDoc\HTMLDoc;
use Kirby\Cms\App;

App::plugin('kensho/htmldoc', [
    'options' => [
        'contentTypes' => [
            'htm',
            'html',
        ],
        'options' => [
            'quotes' => true,
        ],
    ],
    'hooks' => [
        'page.render:after' => function (string $contentType, array $data, string $html): string {
            $kirby   = App::instance();
            $lib     = new html\htmldoc;
            $HTMLDoc = new HTMLDoc($kirby, $lib);

            if ($HTMLDoc->isApplicable($contentType)) {
                return $HTMLDoc->getMinified($html);
            }
            return $html;
        },
    ],
]);
