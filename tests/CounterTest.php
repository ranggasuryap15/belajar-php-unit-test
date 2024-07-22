<?php

namespace ProgrammerZamanNow\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    // nama function diawali dengan testABC
    public function testCounter()
    {
        $counter = new Counter();
        $counter->increment();
        Assert::assertEquals(1, $counter->count());
    }
}
