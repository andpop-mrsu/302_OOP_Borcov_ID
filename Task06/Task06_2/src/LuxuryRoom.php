<?php

namespace App;

class LuxuryRoom implements Room
{
    public function getDescription(): string
    {
        return 'Люкс';
    }

    public function getPrice(): float
    {
        return 3000;
    }
}