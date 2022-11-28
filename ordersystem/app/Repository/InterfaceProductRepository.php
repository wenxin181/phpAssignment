<?php


namespace App\Repository;

interface InterfaceProductRepository {
    public function getAllProducts();

    public function createProduct(array $data);
}