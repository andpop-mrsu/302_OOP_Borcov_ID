<?php
declare(strict_types=1);

namespace App;

class ProductCollection
{
    /** @var Product[] */
    private array $products;

    public function __construct(array $products = [])
    {
        $this->products = array_values($products);
    }

    public function filter(ProductFilteringStrategy $filterStrategy): ProductCollection
    {
        $filtered = array_filter($this->products, [$filterStrategy, 'filter']);
        return new ProductCollection($filtered);
    }

    public function getProductsArray(): array
    {
        return $this->products;
    }
}