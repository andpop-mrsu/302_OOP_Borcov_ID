<?php

declare(strict_types=1);

namespace App;

use Iterator;

class StudentsList implements Iterator
{
    /** @var Student[] */
    private array $students = [];
    private int $position = 0;

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): Student
    {
        return $this->students[$this->position];
    }

    public function key(): int
    {
        return $this->students[$this->position]->getId();
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->students[$this->position]);
    }
}