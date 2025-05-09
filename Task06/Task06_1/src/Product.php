<?php
declare(strict_types=1);

namespace App;

class Product
{
    public string $name;
    public float $listPrice;
    public ?float $sellingPrice = null;
    public string $manufacturer;
}