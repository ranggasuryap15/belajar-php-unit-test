<?php

namespace ProgrammerZamanNow\Test;

use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    // nama function diawali dengan testABC
    public function testCounter()
    {
        $counter = new Counter();
        $counter->increment();
        echo $counter->count() . PHP_EOL;
    }
}
