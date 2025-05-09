<?php

namespace App;

class DinnerDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', ужин';
    }

    public function getPrice(): float
    {
        return $this->room->getPrice() + 800;
    }
}