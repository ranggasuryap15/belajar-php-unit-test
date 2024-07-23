<?php

namespace ProgrammerZamanNow\Test;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testSuccess()
    {
        $person = new Person("Eko");
        self::assertEquals("Hi Budi, my name is Eko", $person->sayHello("Budi"));
    }

    public function testException()
    {
        $person = new Person("Eko");
        $this->expectException(\Exception::class);
        $person->sayHello(null);
    }
}
