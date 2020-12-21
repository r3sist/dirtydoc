<?php declare(strict_types=1);

namespace Test;

use resist\Dirtydoc\Parser;

/**
 * Class TestClass - this is a dockblock description
 * @package Test
 * @deprecated Marked as deprecated
 */
class TestClass extends Parser
{
    /** @var string Private property with dockblock */
    private string $privateProperty;

    /** @var string Protected property with dockblock */
    protected string $protectedProperty;

    /** @var string Public property with dockblock */
    public string $publicPropertyWithDockBlock;

    public string $publicPropertyWithType;

    /** @var mixed Description  */
    public string $publicPropertyWithDescription;

    public $publicPropertyWithoutAnyType;

    /** @var array $publicPropertyWithoutTypeButDOckblock This public property has type in dockbock only */
    public $publicPropertyWithoutTypeButHasDockblock;

    /** @var int Public constant with dockblock */
    public const CONST = 10;


    /**
     * Standard tests have proper dockblock and PHP types
     * @param string $param0 Parameter description
     * @return string Return description
     */
    public function test(string $param0): string
    {
        return '';
    }

    /**
     * Has deprecated tag without message
     * @param string $param0 Parameter description
     * @return string Return description
     * @deprecated
     */
    public function testDeprecated0(string $param0): string
    {
        return '';
    }

    /**
     * Has deprecated tag with message
     * @param string $param0 Parameter description
     * @return string Return description
     * @deprecated
     */
    public function testDeprecated1(string $param0): string
    {
        return '';
    }

    /**
     * Tests static method
     * @param string $param0 Parameter description
     * @return string Return description
     */
    public static function testStatic(string $param0): string
    {
        return '';
    }

    /**
     * Tests
     * Multi
     * line
     * description
     * @param string $param0 Parameter description
     * @return string Return description
     */
    public function testMultiLineDescription(string $param0): string
    {
        return '';
    }

    /** Tests one line dockblock description */
    public function testOneLine(string $param0): string
    {
        return '';
    }

    /** @deprecated Tests one line dockblock tag */
    public function testOneLineTag(string $param0): string
    {
        return '';
    }

    /**
     * Tests custom parameter type
     * @param string $param0 Parameter description
     * @param bool $param1
     * @param \Foo\Bar $object Param1 has no description like this
     * @return string Return description
     */
    public function testParams(string $param0, bool $param1, \Foo\Bar $object): string
    {
        return '';
    }

    /**
     * Parameters with deafults
     * @param string $param0 String default
     * @param bool $param1 Bool default
     * @param int $number Integer default
     * @param float $float Float default
     * @return string Return description
     */
    public function testDefaults(string $param0 = 'default', bool $param1 = true, int $number = 10, float $float = 10.1): string
    {
        return '';
    }

    public function testWithoutDockblock0(string $param0): string
    {
        return '';
    }

    public function testWithoutDockblock1($param0)
    {
        return;
    }

    /**
     * Types are defined only in dockblocks
     * @param string $param0
     * @param mixed $param1
     * @param int $optional
     * @return string
     */
    public function testWithoutPHPTypes($param0, $param1, $optional = 1)
    {
        return '';
    }
}