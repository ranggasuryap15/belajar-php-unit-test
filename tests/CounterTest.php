<?php

namespace ProgrammerZamanNow\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    // nama function diawali dengan testABC atau bisa menggunakan annotations @test

    private Counter $counter;

    // set up selalu dijalankan sebelum function test dijalankan
    protected function setUp(): void
    {
        $this->counter = new Counter();
    }

    public function testIncrement()
    {
        Assert::assertEquals(0, $this->counter->count());
        Assert::markTestIncomplete("Belum selesai");
    }

    public function testIncrement2()
    {
        Assert::assertEquals(0, $this->counter->count());
        Assert::markTestSkipped("Belum selesai");
    }

    public function testCounter()
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->count());
    }

    /**
     * @test
     */
    public function increment()
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->count());
    }

    public function testFirst(): Counter
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->count());
        return $this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter)
    {
        $counter->increment();
        Assert::assertEquals(2, $counter->count());
    }

    protected function tearDown(): void
    {
        echo "tearDown" . PHP_EOL;
    }

    /**
     * @after
     */
    protected function after(): void
    {
        echo "after" . PHP_EOL;
    }
}
