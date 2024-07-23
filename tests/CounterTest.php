<?php

namespace ProgrammerZamanNow\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    // nama function diawali dengan testABC atau bisa menggunakan annotations @test

    public function testCounter()
    {
        $counter = new Counter();
        $counter->increment();
        Assert::assertEquals(1, $counter->count());
    }

    /**
     * @test
     */
    public function increment()
    {
        $counter = new Counter();
        $counter->increment();
        Assert::assertEquals(1, $counter->count());
    }

    public function testFirst(): Counter
    {
        $counter = new Counter();
        $counter->increment();
        Assert::assertEquals(1, $counter->count());
        return $counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter)
    {
        $counter->increment();
        Assert::assertEquals(2, $counter->count());
    }
}
