<?php

namespace ProgrammerZamanNow\Test;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testManual()
    {
        self::assertEquals(10, Math::sum([5, 5]));
        self::assertEquals(20, Math::sum([5, 5, 5, 5]));
    }

    /**
     * @dataProvider mathSumData
     */
    public function testDataProvider(array $values, int $expected)
    {
        self::assertEquals($expected, Math::sum($values));
    }

    public function mathSumData(): array
    {
        return [
            [[5, 5], 10],
            [[5, 5, 5, 5], 20],
            [[5, 5, 5, 5, 5, 5], 30]

        ];
    }
}
