<?php

namespace App\Controller;


use App\DTO\ProductDTO;
use App\Entity\Product;
use App\Interface\Controller;
use App\Interface\DTO;

final class HomeController implements Controller {

    protected readonly DTO $product;

    protected readonly Product $productItem;

    public function __construct()
    {
        $this->productItem = new Product();
    }

    public function index(): DTO
    {
        $this->storeProduct();
        $this->product = new ProductDTO($this->productItem);

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With");
        header("Content-type:application/json");
        header("HTTP/1.1 200 Success");

        var_dump($this->product);

        return $this->product;
    }

    public function all(): DTO
    {
        echo json_encode('test');
    }

    public function getById(string $id): DTO
    {
        // TODO: Implement getById() method.
    }

    protected function storeProduct(): void
    {
        $this->productItem->setProductName('apple');
        $this->productItem->setPrice(50);
    }
}