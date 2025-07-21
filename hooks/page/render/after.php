<?php declare(strict_types=1);

use hexydec\html\htmldoc;

return function (string $contentType, array $data, string $html): string {
	$config = $this->option(key: 'kensho.htmldoc.config', default: []);
	$contentTypes = $this->option(
		key: 'kensho.htmldoc.contentTypes',
		default: [],
	);

	if (in_array(needle: $contentType, haystack: $contentTypes)) {
		$lib = new htmldoc(config: $config);

		if ($lib->load(html: $html)) {
			$lib->minify();
			return $lib->html();
		}
	}
	return $html;
};
