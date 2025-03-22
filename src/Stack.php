<?php

namespace App;

class Stack implements StackInterface
{
    private $stack;

    public function __construct(...$elements)
    {
        $this->stack = array_reverse($elements);
    }

    public function push(...$elements): void
    {
        foreach ($elements as $element) {
            array_unshift($this->stack, $element);
        }
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return null;
        }
        return array_shift($this->stack);
    }

    public function top()
    {
        if ($this->isEmpty()) {
            return null;
        }
        return $this->stack[0];
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }

    public function copy(): Stack
    {
        return new Stack(...array_reverse($this->stack));
    }

    public function __toString(): string
    {
        return '[' . implode('->', $this->stack) . ']';
    }
}