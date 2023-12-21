# Kirby HTMLDoc

Minifies HTML5 output for [Kirby][1] templates.

## General

Integrates [Hexydec’s][2] excellent [HTMLDoc library][3] into Kirby projects to minify HTML5 output.

## Installation

```shell
composer require kenshodigital/kirby-htmldoc ^1.0
```

## Usage

Basically works out of the box without any additional configuration. 

### Configuration

However, applicable content types as well as the library’s [default configuration][4] can be easily modified in your site’s [`config.php`][5].

```php
<?php

return [
    'kensho.htmldoc' => [
        'contentTypes' = [
            'htm',
            'html',                    
        ],
        'options' => [
            'quotes' => false,
            'urls'   => [
                'relative' => false,
                'parent'   => false,
            ],
            ...
        ],
    ],
];
```

#### Defaults

Applicable content types are set to `htm` and `html` by default. For the library, only the settings for quotes and relative URLs deviate from the library’s defaults and are set to `false` in this plugin.

[1]: https://getkirby.com
[2]: https://github.com/hexydec
[3]: https://github.com/hexydec/htmldoc
[4]: https://github.com/hexydec/htmldoc/blob/master/docs/api/minify.md#options
[5]: https://getkirby.com/docs/guide/configuration#the-config-php
