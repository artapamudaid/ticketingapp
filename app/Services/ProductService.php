<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById(int $id)
    {
        return Product::find($id);
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct(int $id, array $data)
    {
        $product = Product::find($id);

        if ($product) {
            $product->update($data);
        }

        return $product;
    }

    public function deleteProduct(int $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
