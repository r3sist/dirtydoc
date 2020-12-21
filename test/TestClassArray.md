```
Array
(
    [namespace] => Test
    [name] => TestClass
    [dockblock] => /**
 * Class TestClass - this is a dockblock description
 * @package Test
 * @deprecated Marked as deprecated
 */
    [parentClass] => resist\Dirtydoc\Parser
    [description] => Class TestClass - this is a dockblock description  

    [return] => 
    [params] => Array
        (
        )

    [tags] => Array
        (
            [0] => Array
                (
                    [package] => Test
                )

        )

    [properties] => Array
        (
            [publicPropertyWithDockBlock] => Array
                (
                    [name] => publicPropertyWithDockBlock
                    [type] => string
                    [description] => 
                )

            [publicPropertyWithType] => Array
                (
                    [name] => publicPropertyWithType
                    [type] => string
                    [description] => 
                )

            [publicPropertyWithDescription] => Array
                (
                    [name] => publicPropertyWithDescription
                    [type] => string
                    [description] => 
                )

            [publicPropertyWithoutAnyType] => Array
                (
                    [name] => publicPropertyWithoutAnyType
                    [type] => 
                    [description] => 
                )

            [publicPropertyWithoutTypeButHasDockblock] => Array
                (
                    [name] => publicPropertyWithoutTypeButHasDockblock
                    [type] => 
                    [description] => 
                )

        )

    [methods] => Array
        (
            [__construct] => Array
                (
                    [name] => __construct
                    [isStatic] => 
                    [parent] => resist\Dirtydoc\Parser
                    [parameters] => Array
                        (
                            [classNameWithNamespace] => Array
                                (
                                    [name] => classNameWithNamespace
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => 
                    [dockblock] => /**
     * @param string $classNameWithNamespace Full name (with namespace) of a class
     * @throws ReflectionException
     */
                    [description] => 
                    [deprecated] => 
                    [return] => 
                    [params] => Array
                        (
                            [classNameWithNamespace] => Array
                                (
                                    [type] => string 
                                    [description] => Full name (with namespace) of a class
                                )

                        )

                    [tags] => Array
                        (
                            [0] => Array
                                (
                                    [throws] => ReflectionException
                                )

                        )

                )

            [getArray] => Array
                (
                    [name] => getArray
                    [isStatic] => 
                    [parent] => resist\Dirtydoc\Parser
                    [parameters] => Array
                        (
                        )

                    [returnType] => array
                    [dockblock] => /**
     * Builds multi dimensional associative array of class data
     * @return array Multi dimensional associative array of class data
     */
                    [description] => Builds multi dimensional associative array of class data  

                    [deprecated] => 
                    [return] => array Multi dimensional associative array of class data
                    [params] => Array
                        (
                        )

                    [tags] => Array
                        (
                        )

                )

            [test] => Array
                (
                    [name] => test
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => string
                    [dockblock] => /**
     * Standard tests have proper dockblock and PHP types
     * @param string $param0 Parameter description
     * @return string Return description
     */
                    [description] => Standard tests have proper dockblock and PHP types  

                    [deprecated] => 
                    [return] => string Return description
                    [params] => Array
                        (
                            [param0] => Array
                                (
                                    [type] => string 
                                    [description] => Parameter description
                                )

                        )

                    [tags] => Array
                        (
                        )

                )

            [testDefaults] => Array
                (
                    [name] => testDefaults
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 1
                                    [defaultValue] => "default"
                                )

                            [param1] => Array
                                (
                                    [name] => param1
                                    [type] => bool
                                    [isOptional] => 1
                                    [defaultValue] => `true`
                                )

                            [number] => Array
                                (
                                    [name] => number
                                    [type] => int
                                    [isOptional] => 1
                                    [defaultValue] => 10
                                )

                            [float] => Array
                                (
                                    [name] => float
                                    [type] => float
                                    [isOptional] => 1
                                    [defaultValue] => 10.1
                                )

                        )

                    [returnType] => string
                    [dockblock] => /**
     * Parameters with deafults
     * @param string $param0 String default
     * @param bool $param1 Bool default
     * @param int $number Integer default
     * @param float $float Float default
     * @return string Return description
     */
                    [description] => Parameters with deafults  

                    [deprecated] => 
                    [return] => string Return description
                    [params] => Array
                        (
                            [param0] => Array
                                (
                                    [type] => string 
                                    [description] => String default
                                )

                            [param1] => Array
                                (
                                    [type] => bool 
                                    [description] => Bool default
                                )

                            [number] => Array
                                (
                                    [type] => int 
                                    [description] => Integer default
                                )

                            [float] => Array
                                (
                                    [type] => float 
                                    [description] => Float default
                                )

                        )

                    [tags] => Array
                        (
                        )

                )

            [testDeprecated0] => Array
                (
                    [name] => testDeprecated0
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => string
                    [dockblock] => /**
     * Has deprecated tag without message
     * @param string $param0 Parameter description
     * @return string Return description
     * @deprecated
     */
                    [description] => Has deprecated tag without message  

                    [deprecated] => &nbsp;
                    [return] => string Return description
                    [params] => Array
                        (
                            [param0] => Array
                                (
                                    [type] => string 
                                    [description] => Parameter description
                                )

                        )

                    [tags] => Array
                        (
                        )

                )

            [testDeprecated1] => Array
                (
                    [name] => testDeprecated1
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => string
                    [dockblock] => /**
     * Has deprecated tag with message
     * @param string $param0 Parameter description
     * @return string Return description
     * @deprecated
     */
                    [description] => Has deprecated tag with message  

                    [deprecated] => &nbsp;
                    [return] => string Return description
                    [params] => Array
                        (
                            [param0] => Array
                                (
                                    [type] => string 
                                    [description] => Parameter description
                                )

                        )

                    [tags] => Array
                        (
                        )

                )

            [testMultiLineDescription] => Array
                (
                    [name] => testMultiLineDescription
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => string
                    [dockblock] => /**
     * Tests
     * Multi
     * line
     * description
     * @param string $param0 Parameter description
     * @return string Return description
     */
                    [description] => Tests  
Multi  
line  
description  

                    [deprecated] => 
                    [return] => string Return description
                    [params] => Array
                        (
                            [param0] => Array
                                (
                                    [type] => string 
                                    [description] => Parameter description
                                )

                        )

                    [tags] => Array
                        (
                        )

                )

            [testOneLine] => Array
                (
                    [name] => testOneLine
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => string
                    [dockblock] => /** Tests one line dockblock description */
                    [description] => Tests one line dockblock description  

                    [deprecated] => 
                    [return] => 
                    [params] => Array
                        (
                        )

                    [tags] => Array
                        (
                        )

                )

            [testOneLineTag] => Array
                (
                    [name] => testOneLineTag
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => string
                    [dockblock] => /** @deprecated Tests one line dockblock tag */
                    [description] => 
                    [deprecated] => Tests one line dockblock tag
                    [return] => 
                    [params] => Array
                        (
                        )

                    [tags] => Array
                        (
                        )

                )

            [testParams] => Array
                (
                    [name] => testParams
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                            [param1] => Array
                                (
                                    [name] => param1
                                    [type] => bool
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                            [object] => Array
                                (
                                    [name] => object
                                    [type] => Foo\Bar
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => string
                    [dockblock] => /**
     * Tests custom parameter type
     * @param string $param0 Parameter description
     * @param bool $param1
     * @param \Foo\Bar $object Param1 has no description like this
     * @return string Return description
     */
                    [description] => Tests custom parameter type  

                    [deprecated] => 
                    [return] => string Return description
                    [params] => Array
                        (
                            [param0] => Array
                                (
                                    [type] => string 
                                    [description] => Parameter description
                                )

                            [param1] => Array
                                (
                                    [type] => bool 
                                    [description] => 
                                )

                            [object] => Array
                                (
                                    [type] => \Foo\Bar 
                                    [description] => Param1 has no description like this
                                )

                        )

                    [tags] => Array
                        (
                        )

                )

            [testStatic] => Array
                (
                    [name] => testStatic
                    [isStatic] => 1
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => string
                    [dockblock] => /**
     * Tests static method
     * @param string $param0 Parameter description
     * @return string Return description
     */
                    [description] => Tests static method  

                    [deprecated] => 
                    [return] => string Return description
                    [params] => Array
                        (
                            [param0] => Array
                                (
                                    [type] => string 
                                    [description] => Parameter description
                                )

                        )

                    [tags] => Array
                        (
                        )

                )

            [testWithoutDockblock0] => Array
                (
                    [name] => testWithoutDockblock0
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => string
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => string
                    [dockblock] => 
                    [description] => Array
                        (
                        )

                    [deprecated] => 
                    [return] => 
                    [params] => 
                    [tags] => 
                )

            [testWithoutDockblock1] => Array
                (
                    [name] => testWithoutDockblock1
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => 
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                        )

                    [returnType] => 
                    [dockblock] => 
                    [description] => Array
                        (
                        )

                    [deprecated] => 
                    [return] => 
                    [params] => 
                    [tags] => 
                )

            [testWithoutPHPTypes] => Array
                (
                    [name] => testWithoutPHPTypes
                    [isStatic] => 
                    [parent] => 
                    [parameters] => Array
                        (
                            [param0] => Array
                                (
                                    [name] => param0
                                    [type] => 
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                            [param1] => Array
                                (
                                    [name] => param1
                                    [type] => 
                                    [isOptional] => 
                                    [defaultValue] => 
                                )

                            [optional] => Array
                                (
                                    [name] => optional
                                    [type] => 
                                    [isOptional] => 1
                                    [defaultValue] => 1
                                )

                        )

                    [returnType] => 
                    [dockblock] => /**
     * Types are defined only in dockblocks
     * @param string $param0
     * @param mixed $param1
     * @param int $optional
     * @return string
     */
                    [description] => Types are defined only in dockblocks  

                    [deprecated] => 
                    [return] => string
                    [params] => Array
                        (
                            [param0] => Array
                                (
                                    [type] => string 
                                    [description] => 
                                )

                            [param1] => Array
                                (
                                    [type] => mixed 
                                    [description] => 
                                )

                            [optional] => Array
                                (
                                    [type] => int 
                                    [description] => 
                                )

                        )

                    [tags] => Array
                        (
                        )

                )

        )

)

```