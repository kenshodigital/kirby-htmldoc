<?php declare(strict_types=1);

use hexydec\html\htmldoc;

return function (string $contentType, array $data, string $html): string
{
    $contentTypes = $this->option('kensho.htmldoc.contentTypes', []);
    $config       = $this->option('kensho.htmldoc.config',       []);

    if (\in_array($contentType, $contentTypes)) {
        $lib = new htmldoc($config);

        if ($lib->load($html)) {
            $lib->minify();
            return $lib->html();
        }
    }
    return $html;
};
