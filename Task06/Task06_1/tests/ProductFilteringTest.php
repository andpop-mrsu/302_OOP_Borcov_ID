<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class ProductFilteringTest extends TestCase
{
    public function testManufacturerFilter(): void
    {
        $p1 = new Product();
        $p1->name = 'Шоколад';
        $p1->listPrice = 100.0;
        $p1->sellingPrice = 50.0;
        $p1->manufacturer = 'Красный Октябрь';

        $p2 = new Product();
        $p2->name = 'Мармелад';
        $p2->listPrice = 100.0;
        $p2->manufacturer = 'Ламзурь';

        $collection = new ProductCollection([$p1, $p2]);
        $result = $collection->filter(new ManufacturerFilter('Ламзурь'));

        $this->assertCount(1, $result->getProductsArray());
        $this->assertSame($p2, $result->getProductsArray()[0]);
    }

    public function testMaxPriceFilter(): void
    {
        $p1 = new Product();
        $p1->name = 'Шоколад';
        $p1->listPrice = 100.0;
        $p1->sellingPrice = 50.0;
        $p1->manufacturer = 'Красный Октябрь';

        $p2 = new Product();
        $p2->name = 'Мармелад';
        $p2->listPrice = 100.0;
        $p2->manufacturer = 'Ламзурь';

        $collection = new ProductCollection([$p1, $p2]);
        $result = $collection->filter(new MaxPriceFilter(50.0));

        $this->assertCount(1, $result->getProductsArray());
        $this->assertSame($p1, $result->getProductsArray()[0]);
    }
}