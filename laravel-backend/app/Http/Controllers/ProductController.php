<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{
    private ProductRepositoryInterface $userRepository;

    public function __construct(ProductRepositoryInterface $userRepository) 
    {
        $this->ProductRepository = $userRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->ProductRepository->getAllProducts()
        ]);
    }

    public function store(CreateProductRequest $request): JsonResponse 
    {
        $user = Product::create($request->validated());
        return response()->json(['message' => 'Product created successfully']);
    }

}
