# Parser

***resist\Dirtydoc\Parser*** 

Class parser  


## Public methods 

### __construct()

```php
public function __construct(string $classNameWithNamespace)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$classNameWithNamespace** |  | Full name (with namespace) of a class |
### getArray()

Builds multi dimensional associative array of class data  


```php
public function getArray(): array
```

Returns: `array` Multi dimensional associative array of class data



---

# MarkdownGenerator

***resist\Dirtydoc\MarkdownGenerator*** 

Markdown documentation generator from parsed class  


## Public methods 

### __construct()

```php
public function __construct(string $classNameWithNamespace)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$classNameWithNamespace** |  | Full name (with namespace) of a class |
### generateMarkdownFile()

**DEPRECATED** &nbsp;

Saves generated documentation to file  


```php
public function generateMarkdownFile(string $fileName): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$fileName** |  | Full file name (with path) for file_put_contents() |
### getMarkdown()

Generates markdown documentation  


```php
public function getMarkdown(): string
```

Returns: `string` Markdown string as class documentation



---

