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

use Stringable;

use function boolval;
use function floatval;
use function intval;
use function strval;

final class SafeCast
{
    public static function tryInt(mixed $v): ?int
    {
        return match (true) {
            is_scalar($v), is_array($v), is_resource($v), is_null($v) => intval($v),
            default => null,
        };
    }

    public static function tryString(mixed $v): ?string
    {
        return match (true) {
            is_scalar($v), $v instanceof Stringable, is_null($v) => strval($v),
            default => null,
        };
    }

    public static function tryFloat(mixed $v): ?float
    {
        return match (true) {
            is_scalar($v), is_array($v), is_resource($v), is_null($v) => floatval($v),
            default => null,
        };
    }

    public static function tryBool(mixed $v): ?bool
    {
        return boolval($v);
    }
}
