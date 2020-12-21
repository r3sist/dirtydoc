<?php declare(strict_types = 1);
/**
 * Dirtydoc: Quick markdown documentation generator for public methods of a class
 * (c) resist
 * @package resist/dirtydoc
 */

namespace resist\Dirtydoc;

use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use ReflectionProperty;
use RuntimeException;

/**
 * Class parser
 */
class Parser
{
    private ReflectionClass $reflection;

    /**
     * @param string $classNameWithNamespace Full name (with namespace) of a class
     * @throws ReflectionException
     */
    public function __construct(string $classNameWithNamespace)
    {
        $this->reflection = new ReflectionClass($this->verifyClassName($classNameWithNamespace));
    }

    /**
     * Builds multi dimensional associative array of class data
     * @return array Multi dimensional associative array of class data
     */
    public function getArray(): array
    {
        $data = [];

        $data['namespace'] = $this->getClassNamespace();
        $data['name'] = $this->getClassName();
        $data['dockblock'] = $this->getClassDocblock();
        $data['parentClass'] = $this->getParentClass();

        $parsedDockblock = $this->getParsedDocblock($data['dockblock']);

        $data['description'] = $parsedDockblock['description'];
        $data['return'] = $parsedDockblock['return'];
        $data['params'] = $parsedDockblock['params'];
        $data['tags'] = $parsedDockblock['tags'];

        $data['properties'] = $this->getClassProperties();
        $data['methods'] = $this->getPublicMethods();

        return $data;
    }

    private function verifyClassName(string $className): string
    {
        if (preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*(\\\\[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*)*$/', $className)) {
            return $className;
        }

        throw new RuntimeException('Invalid class name.');
    }

    private function getClassNamespace(): string
    {
        return $this->reflection->getNamespaceName();
    }

    private function getClassName(): string
    {
        return $this->reflection->getShortName();
    }

    private function getParentClass(): string
    {
        $parent = $this->reflection->getParentClass();
        if ($parent === false) {
            return '';
        }

        return $this->reflection->getParentClass()->getName();
    }

    private function getClassDocblock(): string
    {
        $docblock = $this->reflection->getDocComment();

        if ($docblock === false) {
            return '';
        }

        return $docblock;
    }

    private function getClassProperties(): array
    {
        $properties = [];

        foreach ($this->getPublicPropertyNames() as $propertyName) {
            $propertyType = $this->getPropertyType($propertyName);

            $properties[$propertyName]['name'] = $propertyName;
            $properties[$propertyName]['type'] = $propertyType;
            $properties[$propertyName]['description'] = ''; // TODO
        }

        return $properties;
    }

    private function getPublicPropertyNames(): array
    {
        $properties = $this->reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        return array_column($properties, 'name');
    }

    private function getPropertyType(string $propertyName): string
    {
        try {
            $propertyType = $this->reflection->getProperty($propertyName)->getType();

            if ($propertyType !== null) {
                return $propertyType->getName();
            }
        } catch (ReflectionException $e) {
        }

        return '';
    }

    private function getPublicMethods(): array
    {
        $methods = [];

        foreach ($this->getPublicMethodNames() as $methodName) {

            $method = $this->reflection->getMethod($methodName);

            $methods[$methodName]['name'] = $methodName;
            $methods[$methodName]['isStatic'] = $method->isStatic();
            $methods[$methodName]['parent'] = ($method->class !== $this->reflection->name?$method->class:'');
            $methods[$methodName]['parameters'] = $this->getMethodParameters($method);
            $methods[$methodName]['returnType'] = $this->getMethodReturnType($method);

            $dockblock =  $this->getMethodDocblock($method);
            $methods[$methodName]['dockblock'] = $dockblock;

            $parsedDockblock = $this->getParsedDocblock($dockblock);

            $methods[$methodName]['description'] = $parsedDockblock['description'];
            $methods[$methodName]['deprecated'] = $parsedDockblock['deprecated'];
            $methods[$methodName]['return'] = $parsedDockblock['return'];
            $methods[$methodName]['params'] = $parsedDockblock['params'];
            $methods[$methodName]['tags'] = $parsedDockblock['tags'];
        }

        return $methods;
    }

    private function getPublicMethodNames(): array
    {
        $methods = $this->reflection->getMethods(ReflectionMethod::IS_PUBLIC);

        $methodNames = array_column($methods, 'name');
        sort($methodNames);

        return $methodNames;
    }

    private function getMethodParameters(ReflectionMethod $method): array
    {
        $parameters = [];

        foreach ($method->getParameters() as $parameter) {
            $parameterArray['name'] = $parameter->getName();
            $parameterArray['type'] = '';
            $parameterArray['isOptional'] = $parameter->isOptional();
            $parameterArray['defaultValue'] = '';

            if ($parameterArray['isOptional']) {
                $defaultValue = $parameter->getDefaultValue();
                $parameterArray['defaultValue'] = '"'.$parameter->getDefaultValue().'"';
                if ($parameter->getDefaultValue() === '') {
                    $parameterArray['defaultValue'] = '`empty string`';
                }
                if (is_array($parameter->getDefaultValue())) {
                    $parameterArray['defaultValue'] = ''.json_encode($parameter->getDefaultValue(), JSON_THROW_ON_ERROR|JSON_UNESCAPED_UNICODE);
                }
                if ($parameter->getDefaultValue() === true) {
                    $parameterArray['defaultValue'] = '`true`';
                }
                if ($parameter->getDefaultValue() === false) {
                    $parameterArray['defaultValue'] = '`false`';
                }
                if (is_numeric($defaultValue)) {
                    $parameterArray['defaultValue'] = $parameter->getDefaultValue();
                }

            }
            if ($parameter->getType() !== null) {
                $parameterArray['type'] = $parameter->getType()->getName();
            }

            $parameters[$parameter->getName()] = $parameterArray;
        }

        return $parameters;
    }

    private function getMethodReturnType(ReflectionMethod $method): string
    {
        $type = $method->getReturnType();
        if ($type !== null) {
            return $type->getName();
        }

        return '';
    }

    private function getMethodDocblock(ReflectionMethod $method): string
    {
        $dockblock = $method->getDocComment();

        if ($dockblock === false) {
            return '';
        }

        return $dockblock;
    }

    /**
     * Based on https://github.com/kamermans/docblock-reflection/
     */
    private function getParsedDocblock(string $docblock): array
    {
        $result = [
            'description' => '',
            'tags' => [],
            'deprecated' => false,
            'return' => false,
            'params' => [],
        ];

        $docblock = str_replace("\r\n", "\n", $docblock);
        $lines = explode("\n", $docblock);

        switch (count($lines)) {
            case 1:
                // handle single-line docblock
                if (!preg_match('#\\/\\*\\*([^*]*)\\*\\/#', $lines[0], $matches)) {
                    $array['description'] = $matches;
                    return $array;
                }
                // remove start-end characters
                $lines[0] = substr($lines[0], 3, -2);
                break;
            case 2:
                // probably malformed
                return [];
            default:
                // handle multi-line docblock, remove first and last lines
                array_shift($lines);
                array_pop($lines);
                break;
        }

        foreach ($lines as $line) {
            $line = preg_replace('#^[ \t\*]*#', '', $line);
            if (strlen($line) < 2) {
                continue;
            }
            if (preg_match('#@([^ ]+)(.*)#', $line, $matches)) {
                $tagName = $matches[1];
                $tagValue = trim($matches[2]);

                switch ($tagName) {
                    case 'param':
                        $beforeDollar = explode('$', $tagValue, 2);
                        if ($beforeDollar[0] && $beforeDollar[1]) {
                            $type = $beforeDollar[0];
                            $afterDollar = explode(' ', $beforeDollar[1], 2);
                            [$name, $desc] = $afterDollar;
                            $result['params'][$name] = ['type' => $type, 'description' => $desc];
                        }
                        break;
                    case 'deprecated':
                        $result['deprecated'] = ($tagValue?:'&nbsp;');
                        break;
                    case 'return':
                        $result['return'] = $tagValue;
                        break;
                    default:
                        $result['tags'][] = [$tagName => $tagValue];
                }
                continue;
            }

            $result['description'].= trim($line)."  \n";
        }
        return $result;
    }
}
