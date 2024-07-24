<?php

namespace ProgrammerZamanNow\Test;

use PHPUnit\Framework\TestCase;

class CounterStaticTest extends TestCase
{
    public static Counter $counter;

    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }

    public function testFirst()
    {
        self::$counter->increment();
        self::assertEquals(1, self::$counter->count());
    }

    // sharing data fixture 
    public function testSecond()
    {
        self::$counter->increment();
        self::assertEquals(2, self::$counter->count());
    }

    public static function tearDownAfterClass(): void
    {
        echo "Unit Test selesai" . PHP_EOL;
    }
}
