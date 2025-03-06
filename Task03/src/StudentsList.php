<?php

class StudentsList
{
    private $students = [];

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function count(): int
    {
        return count($this->students);
    }

    public function get(int $n): Student
    {
        if (isset($this->students[$n])) {
            return $this->students[$n];
        }
        throw new OutOfBoundsException("Студент с индексом $n не найден.");
    }

    public function store(string $fileName): void
    {
        file_put_contents($fileName, serialize($this->students));
    }

    public function load(string $fileName): void
    {
        if (!file_exists($fileName)) {
            throw new RuntimeException("Файл $fileName не найден.");
        }
        $this->students = unserialize(file_get_contents($fileName));
    }
}