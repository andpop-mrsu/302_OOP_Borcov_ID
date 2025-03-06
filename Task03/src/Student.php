<?php

class Student
{
    private static $nextId = 1;

    private $id;
    private $lastName;
    private $firstName;
    private $faculty;
    private $course;
    private $group;

    public function __construct()
    {
        $this->id = self::$nextId++;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getFaculty(): string
    {
        return $this->faculty;
    }

    public function setFaculty(string $faculty): self
    {
        $this->faculty = $faculty;
        return $this;
    }

    public function getCourse(): int
    {
        return $this->course;
    }

    public function setCourse(int $course): self
    {
        $this->course = $course;
        return $this;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): self
    {
        $this->group = $group;
        return $this;
    }

    public function __toString(): string
    {
        return "Id: {$this->id}\n" .
               "Фамилия: {$this->lastName}\n" .
               "Имя: {$this->firstName}\n" .
               "Факультет: {$this->faculty}\n" .
               "Курс: {$this->course}\n" .
               "Группа: {$this->group}";
    }
}