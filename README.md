# Dirtydoc

Primitive markdown documentation generator for public methods of a class using PHP types and docblocks.

`composer require resist/dirtydoc`

## Usage

Example: [Self generated documentation: API.md](API.md)

```php
<?php declare(strict_types=1);
// dirtydoc.php

require_once(__DIR__.'/vendor/autoload.php');

$documentation = '';

// Define classes to be documented
$classes = [
    \resist\Dirtydoc\Parser::class,
    \resist\Dirtydoc\MarkdownGenerator::class,
];

// Fill up $documentation
foreach ($classes as $className) {
    $markdownGenerator = new \resist\Dirtydoc\MarkdownGenerator($className);
    $documentation .= $markdownGenerator->getMarkdown().PHP_EOL.PHP_EOL.'---'.PHP_EOL.PHP_EOL;
}

// Write to file
file_put_contents(__DIR__.'/API.md', $documentation);
```
