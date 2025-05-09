<?php

namespace App;

class FoodDeliveryDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', доставка еды';
    }

    public function getPrice(): float
    {
        return $this->room->getPrice() + 300;
    }
}