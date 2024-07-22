<?php

namespace ProgrammerZamanNow\Test;

class Counter
{

    private $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function count(): int
    {
        return $this->count;
    }
}
