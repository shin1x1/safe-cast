# SafeCast PHP Library

SafeCast is a library designed to simplify and safeguard typecasting in PHP. It offers an efficient way to convert mixed values to any given type, following the conversion rules of the built-in PHP functions `intval()`, `strval()`, `floatval()`, and `boolval()` without causing PHP errors.

## Motivation

The primary motivations behind SafeCast are:

- **Avoid PHP errors**: Built-in PHP casting functions, such as `intval()`, can sometimes cause errors depending on the value being converted. SafeCast provides an alternative that consistently returns either the safely cast value or `null`, instead of producing a PHP error.
- **Consistent error handling**: With SafeCast, errors during casting are uniformly handled either by throwing an `InvalidArgumentException` or returning `null`, making error handling more predictable and manageable.
- **Safe casting of mixed types**: It provides a safe and consistent way to cast values of mixed types to the desired type.
- **Use of PHP's built-in conversion logic**: Despite its focus on providing safe typecasting, SafeCast sticks to the conversion rules of the built-in PHP casting functions. It does not introduce any conversion behavior that is inconsistent with PHP's built-in type casting.
- **Avoiding errors with PHPStan**: SafeCast helps to prevent errors when mixed values are provided to (int|float|str|bool)val() functions.

## Features

SafeCast offers simple wrappers around the PHP's native casting functions `(int|float|str|bool)val()`, with the following available functions:

- `try_<type>(mixed $v): ?<type>` - These functions are intended to be used when you're working with a value that might cause a casting error. They attempt to cast the given value to the specified type and return `null` if the cast is not possible.
- `to_<type>(mixed $v): <type>` - These functions are intended to be used when the value is expected to be of the specific type. For example, when dealing with a setting or a programmer-determined value, use these functions. If a casting error occurs, it is treated as a programmer error and an `InvalidArgumentException` is thrown.

These functions are available for `int`, `string`, `float`, and `bool` types.

## Usage

Here's an example of how you can use SafeCast:

```php
<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use function Shin1x1\SafeCast\to_int;
use function Shin1x1\SafeCast\try_int;

var_dump(try_int('100')); // int(100)
var_dump(try_int(new stdClass())); // null

var_dump(to_int('100')); // int(100)
var_dump(to_int(new stdClass())); // InvalidArgumentException
```

In this example, the `$value` is successfully cast to each type. Note the use of function style for calling the methods.

## Installation

Use Composer to install SafeCast in your PHP project:

```
bashCopy code
composer require shin1x1/safecast
```

## Contributing

Contributions are welcome! Please feel free to submit a pull request.

## License

This project is open-sourced software licensed under the MIT license.