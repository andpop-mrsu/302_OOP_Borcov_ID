<?php

namespace App;

class StandardRoom implements Room
{
    public function getDescription(): string
    {
        return 'Стандарт';
    }

    public function getPrice(): float
    {
        return 2000;
    }
}