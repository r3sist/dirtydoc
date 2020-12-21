<?php declare(strict_types = 1);
/**
 * Run this script to generate public API documentation via Dirtydoc
 * > php dirytdoc.php
 */

require_once(__DIR__.'/../vendor/autoload.php');

require_once(__DIR__.'/TestClass.php');

$classes = [
    \Test\TestClass::class,
];

$markdown = '';
$array = '';

foreach ($classes as $className) {
    $mg = new \resist\Dirtydoc\MarkdownGenerator($className);
    $markdown .= $mg->getMarkdown().PHP_EOL.PHP_EOL.'---'.PHP_EOL.PHP_EOL;

    $p = new \resist\Dirtydoc\Parser($className);
    $array .= '```' .PHP_EOL.print_r($p->getArray(), true).PHP_EOL.'```';
}

file_put_contents(__DIR__.'/TestClass.md', $markdown);
file_put_contents(__DIR__.'/TestClassArray.md', $array);
