<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductRepository implements ProductRepositoryInterface 
{
    public function getAllProducts() 
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function getProductById($ProductId) 
    {
        $products = Product::findOrFail($ProductId);
        return ProductResource::collection($products);
    }

    public function deleteProduct($ProductId) 
    {
        Product::destroy($ProductId);
    }

    public function createProduct(array $ProductDetails) 
    {
        return Product::create($ProductDetails);
    }

    public function updateProduct($ProductId, array $newDetails) 
    {
        $users = Product::whereId($ProductId)->update($newDetails);
        return ProductResource::collection($products);
    }

}