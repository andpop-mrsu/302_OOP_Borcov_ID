<?php

namespace App\Tests;

use App\BuffetBreakfastDecorator;
use App\DinnerDecorator;
use App\EconomyRoom;
use App\SofaDecorator;
use App\FoodDeliveryDecorator;
use App\InternetDecorator;
use App\LuxuryRoom;
use App\StandardRoom;
use PHPUnit\Framework\TestCase;

class RoomBookingTest extends TestCase
{
    public function testEconomyRoom(): void
    {
        $room = new EconomyRoom();
        $this->assertEquals('Эконом', $room->getDescription());
        $this->assertEquals(1000, $room->getPrice());
    }

    public function testStandardRoomWithInternetAndBreakfast(): void
    {
        $room = new StandardRoom();
        $room = new InternetDecorator($room);
        $room = new BuffetBreakfastDecorator($room);

        $this->assertEquals('Стандарт, выделенный Интернет, шведский стол', $room->getDescription());
        $this->assertEquals(2600, $room->getPrice());
    }

    public function testLuxuryRoomWithAllServices(): void
    {
        $room = new LuxuryRoom();
        $room = new InternetDecorator($room);
        $room = new SofaDecorator($room);
        $room = new FoodDeliveryDecorator($room);
        $room = new BuffetBreakfastDecorator($room);
        $room = new DinnerDecorator($room);

        $this->assertEquals(
            'Люкс, выделенный Интернет, дополнительный диван, доставка еды, шведский стол, ужин',
            $room->getDescription()
        );
        $this->assertEquals(5200, $room->getPrice());
    }
}