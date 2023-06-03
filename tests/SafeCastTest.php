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
use Shin1x1\SafeCast\SafeCast;

class SafeCastTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider_toInt
     */
    public function toInt(?int $expected, mixed $value): void
    {
        // Arrange && Act && Assert
        $this->assertSame($expected, SafeCast::tryInt($value));
    }

    /**
     * @return iterable<string, array{expected: ?int, value: mixed}>
     */
    public static function dataProvider_toInt(): iterable
    {
        yield '1' => ['expected' => 1, 'value' => 1];
        yield '1.0' => ['expected' => 1, 'value' => 1.0];
        yield '1.5' => ['expected' => 1, 'value' => 1.5];
        yield '"200"' => ['expected' => 200, 'value' => '200'];
        yield '"200a"' => ['expected' => 200, 'value' => '200a'];
        yield '"Hello"' => ['expected' => 0, 'value' => 'Hello'];
        yield 'true' => ['expected' => 1, 'value' => true];
        yield 'false' => ['expected' => 0, 'value' => false];
        yield 'null' => ['expected' => 0, 'value' => null];
        yield 'stdClass' => ['expected' => null, 'value' => new \stdClass()];
        yield 'Closure' => ['expected' => null, 'value' => function () {}];
        yield 'array' => ['expected' => 1, 'value' => [1, 2]];
    }

    /**
     * @test
     */
    public function toInt_with_resource_then_return_int(): void
    {
        // Arrange && Act && Assert
        $this->assertIsInt(SafeCast::tryInt(fopen('php://memory', 'r')));
    }

    /**
     * @test
     * @dataProvider dataProvider_toString
     */
    public function toString_(?string $expected, mixed $value): void
    {
        // Arrange && Act && Assert
        $this->assertSame($expected, SafeCast::tryString($value));
    }

    /**
     * @return iterable<string, array{expected: ?string, value: mixed}>
     */
    public static function dataProvider_toString(): iterable
    {
        yield '1' => ['expected' => '1', 'value' => 1];
        yield '1.0' => ['expected' => '1', 'value' => 1.0];
        yield '1.5' => ['expected' => '1.5', 'value' => 1.5];
        yield '"200"' => ['expected' => '200', 'value' => '200'];
        yield '"200a"' => ['expected' => '200a', 'value' => '200a'];
        yield '"Hello"' => ['expected' => 'Hello', 'value' => 'Hello'];
        yield 'true' => ['expected' => '1', 'value' => true];
        yield 'false' => ['expected' => '', 'value' => false];
        yield 'null' => ['expected' => '', 'value' => null];
        yield 'stdClass' => ['expected' => null, 'value' => new \stdClass()];
        yield 'StringableClass' => ['expected' => 'Hello', 'value' => new StringableClass()];
        yield 'Closure' => ['expected' => null, 'value' => function () {}];
        yield 'array' => ['expected' => null, 'value' => [1, 2]];
        yield 'resource' => ['expected' => null, 'value' => fopen('php://memory', 'r')];
    }

    /**
     * @test
     * @dataProvider dataProvider_toFloat
     */
    public function toFloat(?float $expected, mixed $value): void
    {
        // Arrange && Act && Assert
        $this->assertSame($expected, SafeCast::tryFloat($value));
    }

    /**
     * @return iterable<string, array{expected: ?float, value: mixed}>
     */
    public static function dataProvider_toFloat(): iterable
    {
        yield '1' => ['expected' => 1.0, 'value' => 1];
        yield '1.0' => ['expected' => 1.0, 'value' => 1.0];
        yield '1.5' => ['expected' => 1.5, 'value' => 1.5];
        yield '"200"' => ['expected' => 200.0, 'value' => '200'];
        yield '"200a"' => ['expected' => 200.0, 'value' => '200a'];
        yield '"Hello"' => ['expected' => 0.0, 'value' => 'Hello'];
        yield 'true' => ['expected' => 1.0, 'value' => true];
        yield 'false' => ['expected' => 0.0, 'value' => false];
        yield 'null' => ['expected' => 0.0, 'value' => null];
        yield 'stdClass' => ['expected' => null, 'value' => new \stdClass()];
        yield 'Closure' => ['expected' => null, 'value' => function () {}];
        yield 'array' => ['expected' => 1.0, 'value' => [1, 2]];
    }

    /**
     * @test
     */
    public function toFloat_with_resource_return_float(): void
    {
        // Arrange && Act && Assert
        $this->assertIsFloat(SafeCast::tryFloat(fopen('php://memory', 'r')));
    }

    /**
     * @test
     * @dataProvider dataProvider_toBool
     */
    public function toBool(?bool $expected, mixed $value): void
    {
        // Arrange && Act && Assert
        $this->assertSame($expected, SafeCast::tryBool($value));
    }

    /**
     * @return iterable<string, array{expected: ?bool, value: mixed}>
     */
    public static function dataProvider_toBool(): iterable
    {
        yield '1' => ['expected' => true, 'value' => 1];
        yield '0' => ['expected' => false, 'value' => 0];
        yield '1.0' => ['expected' => true, 'value' => 1.0];
        yield '0.1' => ['expected' => true, 'value' => 0.1];
        yield '0.0' => ['expected' => false, 'value' => 0.0];
        yield '"200"' => ['expected' => true, 'value' => '200'];
        yield '"Hello"' => ['expected' => true, 'value' => 'Hello'];
        yield '""' => ['expected' => false, 'value' => ''];
        yield 'true' => ['expected' => true, 'value' => true];
        yield 'false' => ['expected' => false, 'value' => false];
        yield 'null' => ['expected' => false, 'value' => null];
        yield 'stdClass' => ['expected' => true, 'value' => new \stdClass()];
        yield 'Closure' => ['expected' => true, 'value' => function () {}];
        yield 'array' => ['expected' => true, 'value' => [1, 2]];
        yield 'empty array' => ['expected' => false, 'value' => []];
        yield 'resource' => ['expected' => true, 'value' => fopen('php://memory', 'r')];
    }
}
