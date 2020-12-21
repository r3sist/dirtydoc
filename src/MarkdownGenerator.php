<?php declare(strict_types=1);
/**
 * Dirtydoc: Quick markdown documentation generator for public methods of a class
 * (c) resist
 * @package resist/dirtydoc
 */

namespace resist\Dirtydoc;

/**
 * Markdown documentation generator from parsed class
 */
class MarkdownGenerator
{
    private array $classData;

    private string $markdown;

    /**
     * @param string $classNameWithNamespace Full name (with namespace) of a class
     * @throws \ReflectionException
     */
    public function __construct(string $classNameWithNamespace)
    {
        $this->classData = (new Parser($classNameWithNamespace))->getArray();

        $this->markdown = '';

        $this->setHeader();
        $this->setProperties();
        $this->setMethods();
        $this->setParentMethods();
    }

    /**
     * Generates markdown documentation
     * @return string Markdown string as class documentation
     */
    public function getMarkdown(): string
    {
        return $this->markdown;
    }

    /**
     * Saves generated documentation to file
     * @param string $fileName Full file name (with path) for file_put_contents()
     * @deprecated
     */
    public function generateMarkdownFile(string $fileName): void
    {
        file_put_contents($fileName, $this->getMarkdown());
    }

    private function setHeader(): void
    {
        $this->markdown .= '# '.$this->classData['name'].PHP_EOL.PHP_EOL;

        $this->markdown .= '***'.$this->classData['namespace'].'\\'.$this->classData['name'].'*** ';
        if ($this->classData['parentClass'] !== '') {
            $this->markdown .= 'extends ***'.$this->classData['parentClass'].'***';
        }

        if ($this->classData['description']) {
            $this->markdown .= PHP_EOL.PHP_EOL.$this->classData['description'];
        }

        $this->markdown .= PHP_EOL.PHP_EOL;
    }

    private function setProperties(): void
    {
        if (empty($this->classData['properties'])) {
            return;
        }

        $this->markdown .= '## Public properties '.PHP_EOL.PHP_EOL;
        $this->markdown .= '| Type | Property name | Description |'.PHP_EOL.'| --- | --- | --- |' .PHP_EOL;

        foreach ($this->classData['properties'] as $property) {
            $this->markdown .= '| '.$this->formatType($property['type']).' | **$'.$property['name'].'** | '.$property['description']." |".PHP_EOL;
        }
    }

    private function setMethods(): void
    {
        if (empty($this->classData['methods'])) {
            return;
        }

        $this->markdown .= '## Public methods '.PHP_EOL.PHP_EOL;

        foreach ($this->classData['methods'] as $method) {

            if ($method['parent']) {
                continue;
            }

            $this->markdown .= '### '.($method['isStatic']?'::':'').$method['name']. '()'.PHP_EOL.PHP_EOL;

            if (!empty($method['deprecated'])) {
                $this->markdown .= '**DEPRECATED** '.$method['deprecated'].PHP_EOL.PHP_EOL;
            }

            $this->markdown .= ''.($method['description']?''.$method['description'].PHP_EOL.PHP_EOL:'');

            $this->setMethodDefinition($method);

            $this->setMethodParameters($method);

            $this->setMethodReturn($method);
        }
    }

    private function setMethodParameters(array $method): void
    {
        if (empty($method['parameters'])) {
            return;
        }

        $this->markdown .= '| Type | Parameter name | Default value | Description |'.PHP_EOL.'| --- | --- | --- | --- |' .PHP_EOL;

        foreach ($method['parameters'] as $parameter) {
            // Type
            $this->markdown .= '| ';
            if ($parameter['type'] !== '') {
                $this->markdown .= $this->formatType($parameter['type']);
            } else if (isset($method['params'][$parameter['name']])) {
                $this->markdown .= '@'.str_replace('|', ',', $method['params'][$parameter['name']]['type']).'';
            }

            // Name
            $this->markdown .= ' | **$'.$parameter['name'].'**';

            // Default value
            $this->markdown .= ' | '.$parameter['defaultValue'];

            // Description
            $this->markdown .= ' | '.($method['params'][$parameter['name']]['description']??'').' |'.PHP_EOL;
        }

    }

    private function setMethodDefinition(array $method): void
    {
        $this->markdown .= "```php\npublic ";
        $this->markdown .= ($method['isStatic']?'static ':'');
        $this->markdown .= 'function ';
        $this->markdown .= $method['name'].'(';

        if (!empty($method['parameters'])) {
            $cnt = 1;
            foreach ($method['parameters'] as $parameter) {
                if ($parameter['type'] !== '') {
                    $this->markdown .= $parameter['type'].' ';
                } else if (isset($method['params'][$parameter['name']])) {
                    $this->markdown .= '@'.$method['params'][$parameter['name']]['type'].' ';
                }

                $this->markdown .= '$'.$parameter['name'].'';

                if ($parameter['defaultValue']) {
                    $this->markdown .= ' = '.$parameter['defaultValue'];
                }

                if ($cnt < \count($method['parameters'])) {
                    $this->markdown .= ', ';
                }

                $cnt++;
            }
        }

        $this->markdown .= ')';

        if ($method['returnType'] !== '') {
            $this->markdown .= ': '.$method['returnType'];
        } else if (!empty($method['return'])) {
            $this->markdown .= ': @'.$method['return'];
        }

        $this->markdown .= PHP_EOL.'```'.PHP_EOL.PHP_EOL;
    }

    private function setMethodReturn(array $method): void
    {
        if (empty($method['return'])) {
            return;
        }

        $this->markdown .= 'Returns: ';

        if (!empty($method['returnType'])) {
            $this->markdown .= $this->formatType($method['returnType']);
        }

        $returnPieces = explode(' ', $method['return'], 2);

        if (\is_array($returnPieces) && $returnPieces[0] === $method['returnType']) {
            $method['return'] = $returnPieces[1];
        }

        $this->markdown .= $method['return'].PHP_EOL.PHP_EOL;
    }

    private function setParentMethods(): void
    {
        if (empty($this->classData['parentClass'])) {
            return;
        }

        $this->markdown .= '### Parent class *('.$this->classData['parentClass'].")* public methods\n\n";
            foreach ($this->classData['methods'] as $method) {
                if ($method['parent']) {
                    $this->markdown .= '+ '.$method['name']. '()'.PHP_EOL;
                }
            }

    }

    /**
     * @param string $typeName
     * @return string
     * @deprecated
     */
    private function formatType(string $typeName): string
    {
        if (in_array($typeName, ['', 'string', 'null', 'array', 'int', 'bool', 'double', 'float', 'void'])) {
            if ($typeName === '') {
                return '' ;
            }
            return '`'.$typeName.'` ';
        }

        return '*'.$typeName.'*';
    }
}
