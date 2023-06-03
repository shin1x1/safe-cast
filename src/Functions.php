<?php

/**
 * This file is part of the shin1x1/safe-cast package.
 *
 * (c) Masashi Shinbara <shin1x1@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Shin1x1\SafeCast;

if (!function_exists('try_int')) {
    function try_int(mixed $v): ?int
    {
        return SafeCast::tryInt($v);
    }
}

if (!function_exists('to_int')) {
    function to_int(mixed $v): int
    {
        return SafeCast::tryInt($v) ?? throw new \InvalidArgumentException();
    }
}

if (!function_exists('try_string')) {
    function try_string(mixed $v): ?string
    {
        return SafeCast::tryString($v);
    }
}

if (!function_exists('to_string')) {
    function to_string(mixed $v): string
    {
        return SafeCast::tryString($v) ?? throw new \InvalidArgumentException();
    }
}

if (!function_exists('try_float')) {
    function try_float(mixed $v): ?float
    {
        return SafeCast::tryFloat($v);
    }
}

if (!function_exists('to_float')) {
    function to_float(mixed $v): float
    {
        return SafeCast::tryFloat($v) ?? throw new \InvalidArgumentException();
    }
}

if (!function_exists('try_bool')) {
    function try_bool(mixed $v): ?bool
    {
        return SafeCast::tryBool($v);
    }
}

if (!function_exists('to_bool')) {
    function to_bool(mixed $v): bool
    {
        return SafeCast::tryBool($v) ?? throw new \InvalidArgumentException();
    }
}
