<?php

namespace App;

class SofaDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', дополнительный диван';
    }

    public function getPrice(): float
    {
        return $this->room->getPrice() + 500;
    }
}