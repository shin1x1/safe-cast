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

namespace Shin1x1\SafeCast\Tests;

use PHPUnit\Framework\TestCase;

use function Shin1x1\SafeCast\to_bool;
use function Shin1x1\SafeCast\to_float;
use function Shin1x1\SafeCast\to_int;
use function Shin1x1\SafeCast\to_string;
use function Shin1x1\SafeCast\try_bool;
use function Shin1x1\SafeCast\try_float;
use function Shin1x1\SafeCast\try_int;
use function Shin1x1\SafeCast\try_string;

class FunctionsTest extends TestCase
{
    /**
     * @test
     */
    public function tryIntReturnsIntValue(): void
    {
        // Arrange && Act && Assert
        $this->assertSame(100, try_int('100'));
    }

    /**
     * @test
     */
    public function tryIntReturnsNullOnInvalidValue(): void
    {
        // Arrange && Act && Assert
        $this->assertNull(try_int(new \stdClass()));
    }

    /**
     * @test
     */
    public function toIntReturnsIntValue(): void
    {
        // Arrange && Act && Assert
        $this->assertSame(100, to_int('100'));
    }

    /**
     * @test
     */
    public function tryIntThrowsExceptionOnInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        // Arrange && Act && Assert
        to_int(new \stdClass());
    }

    /**
     * @test
     */
    public function tryStringReturnsStringValue(): void
    {
        // Arrange && Act && Assert
        $this->assertSame('1', try_string(1));
    }

    /**
     * @test
     */
    public function tryStringReturnsNullOnInvalidValue(): void
    {
        // Arrange && Act && Assert
        $this->assertNull(try_string(new \stdClass()));
    }

    /**
     * @test
     */
    public function toStringReturnsStringValue(): void
    {
        // Arrange && Act && Assert
        $this->assertSame('1', to_string(1));
    }

    /**
     * @test
     */
    public function toStringThrowsExceptionReturnsNullOnInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        // Arrange && Act && Assert
        to_string(new \stdClass());
    }

    /**
     * @test
     */
    public function tryFloatReturnsFloatValue(): void
    {
        // Arrange && Act && Assert
        $this->assertSame(100.0, try_float('100'));
    }

    /**
     * @test
     */
    public function tryFloatReturnsNullOnInvalidValue(): void
    {
        // Arrange && Act && Assert
        $this->assertNull(try_float(new \stdClass()));
    }

    /**
     * @test
     */
    public function toFloatReturnsFloatValue(): void
    {
        // Arrange && Act && Assert
        $this->assertSame(100.0, try_float('100'));
    }

    /**
     * @test
     */
    public function tryFloatThrowsExceptionOnInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        // Arrange && Act && Assert
        to_float(new \stdClass());
    }

    /**
     * @test
     */
    public function tryBoolReturnsBoolValue(): void
    {
        // Arrange && Act && Assert
        $this->assertSame(true, try_bool('100'));
    }

    /**
     * @test
     */
    public function toBoolReturnsBoolValue(): void
    {
        // Arrange && Act && Assert
        $this->assertSame(true, to_bool('100'));
    }
}
