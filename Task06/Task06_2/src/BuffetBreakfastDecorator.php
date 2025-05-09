<?php

namespace App;

class BuffetBreakfastDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', шведский стол';
    }

    public function getPrice(): float
    {
        return $this->room->getPrice() + 500;
    }
}