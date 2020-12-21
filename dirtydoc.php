<?php declare(strict_types=1);

use resist\Dirtydoc\MarkdownGenerator;
use resist\Dirtydoc\Parser;

require_once(__DIR__.'/vendor/autoload.php');

$documentation = '';

$classes = [
    Parser::class,
    MarkdownGenerator::class,
];

foreach ($classes as $className) {
    $markdownGenerator = new MarkdownGenerator($className);
    $documentation .= $markdownGenerator->getMarkdown().PHP_EOL.PHP_EOL.'---'.PHP_EOL.PHP_EOL;
}

file_put_contents(__DIR__.'/API.md', $documentation);
