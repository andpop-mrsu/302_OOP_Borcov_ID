<?php

namespace App;

class InternetDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', выделенный Интернет';
    }

    public function getPrice(): float
    {
        return $this->room->getPrice() + 100;
    }
}