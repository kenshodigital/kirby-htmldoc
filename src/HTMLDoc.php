<?php declare(strict_types=1);

namespace Kensho\HTMLDoc;

use hexydec\html;
use Kirby\Cms\App;

readonly class HTMLDoc
{
    private const OPTION_CONTENT_TYPES = 'kensho.htmldoc.contentTypes';
    private const OPTION_OPTIONS       = 'kensho.htmldoc.options';

    public function __construct(
        private App          $kirby,
        private html\htmldoc $lib,
    ) {}

    public function isApplicable(string $contentType): bool
    {
        $contentTypes = $this->getContentTypes();

        return \in_array($contentType, $contentTypes);
    }

    private function getContentTypes(): array
    {
        return $this->kirby->option(self::OPTION_CONTENT_TYPES, []);
    }

    public function getMinified(string $html): string
    {
        if ($this->lib->load($html)) {
            $options = $this->getOptions();
            $this->lib->minify($options);
            return $this->lib->html();
        }
        return $html;
    }

    private function getOptions(): array
    {
        return $this->kirby->option(self::OPTION_OPTIONS, []);
    }
}
