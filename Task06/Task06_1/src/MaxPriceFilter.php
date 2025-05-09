<?php
declare(strict_types=1);

namespace App;

class MaxPriceFilter implements ProductFilteringStrategy
{
    private float $maxPrice;

    public function __construct(float $maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }

    public function filter(Product $product): bool
    {
        $price = $product->sellingPrice ?? $product->listPrice;
        return $price <= $this->maxPrice;
    }
}