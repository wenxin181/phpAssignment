<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository implements InterfaceProductRepository {
   
public function createProduct(array $data)
    {            

        $product = new Product();
        $product->productName = $data['productName'];
        $product->productPrice = $data['productPrice'];
        $product->productDetail = $data['productDetail'];
        $product->quantity = $data['quantity'];
        $product->datePublish = $data['datePublish'];
        $product->productImage = $data['productImage'];
        $product->colour = $data['colour'];
        $product->categoryName = $data['categoryName'];

        $product->save();

    }

    public function getAllProducts() {
       return Product::all();
    }
}