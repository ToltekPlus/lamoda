<?php

namespace App\DTO;

use App\Entity\Product;
use App\Interface\DTO;

class ProductDTO implements DTO {
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}