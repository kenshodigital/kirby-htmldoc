<?php declare(strict_types=1);

use Kirby\Cms\App;

App::plugin(
	name: 'kensho/htmldoc',
	extends: [
		'options' => [
			'config' => [
				'minify' => [
					'quotes' => false,
					'urls' => [
						'relative' => false,
						'parent' => false,
					],
				],
			],
			'contentTypes' => ['htm', 'html'],
		],
		'hooks' => [
			'page.render:after' => require __DIR__ .
				'/hooks/page/render/after.php',
		],
	],
);
