<?php

namespace App\Entity;

class Product {
    protected string $product_name;

    protected string $price;

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getProductName(): string
    {
        return $this->product_name;
    }
}