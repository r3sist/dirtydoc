# TestClass

***Test\TestClass*** extends ***resist\Dirtydoc\Parser***

> Class TestClass - this is a dockblock description  


## Public properties 

| Type | Property name | Description |
| --- | --- | --- |
| `string`  | **$publicPropertyWithDockBlock** |  |
| `string`  | **$publicPropertyWithType** |  |
| `string`  | **$publicPropertyWithDescription** |  |
|  | **$publicPropertyWithoutAnyType** |  |
|  | **$publicPropertyWithoutTypeButHasDockblock** |  |
## Public methods 

### test()

Standard tests have proper dockblock and PHP types  


```php
public function test(string $param0): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** |  | Parameter description |
Returns: `string` Return description

### testDefaults()

Parameters with deafults  


```php
public function testDefaults(string $param0 = "default", bool $param1 = `true`, int $number = 10, float $float = 10.1): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** | "default" | String default |
| `bool`  | **$param1** | `true` | Bool default |
| `int`  | **$number** | 10 | Integer default |
| `float`  | **$float** | 10.1 | Float default |
Returns: `string` Return description

### testDeprecated0()

**DEPRECATED** &nbsp;

Has deprecated tag without message  


```php
public function testDeprecated0(string $param0): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** |  | Parameter description |
Returns: `string` Return description

### testDeprecated1()

**DEPRECATED** &nbsp;

Has deprecated tag with message  


```php
public function testDeprecated1(string $param0): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** |  | Parameter description |
Returns: `string` Return description

### testMultiLineDescription()

Tests  
Multi  
line  
description  


```php
public function testMultiLineDescription(string $param0): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** |  | Parameter description |
Returns: `string` Return description

### testOneLine()

Tests one line dockblock description  


```php
public function testOneLine(string $param0): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** |  |  |
### testOneLineTag()

**DEPRECATED** Tests one line dockblock tag

```php
public function testOneLineTag(string $param0): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** |  |  |
### testParams()

Tests custom parameter type  


```php
public function testParams(string $param0, bool $param1, Foo\Bar $object): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** |  | Parameter description |
| `bool`  | **$param1** |  |  |
| *Foo\Bar* | **$object** |  | Param1 has no description like this |
Returns: `string` Return description

### ::testStatic()

Tests static method  


```php
public static function testStatic(string $param0): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** |  | Parameter description |
Returns: `string` Return description

### testWithoutDockblock0()

```php
public function testWithoutDockblock0(string $param0): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$param0** |  |  |
### testWithoutDockblock1()

```php
public function testWithoutDockblock1($param0)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$param0** |  |  |
### testWithoutPHPTypes()

Types are defined only in dockblocks  


```php
public function testWithoutPHPTypes(@string  $param0, @mixed  $param1, @int  $optional = 1): @string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @string  | **$param0** |  |  |
| @mixed  | **$param1** |  |  |
| @int  | **$optional** | 1 |  |
Returns: string

### Parent class *(resist\Dirtydoc\Parser)* public methods

+ __construct()
+ getArray()


---

