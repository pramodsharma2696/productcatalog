<?php

namespace App\Http\Controllers;

use App\BO\ProductBO;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        $categoryId = request('category_id');
        $search = request('search');

        return response()->json($this->productService->getAllProducts($categoryId, $search));
    }

    
    public function show(int $id): JsonResponse
    {
        return response()->json($this->productService->getProductById($id));
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $productBO = new ProductBO(...$request->validated());
        return response()->json($this->productService->createProduct($productBO), 201);
    }

    public function update(ProductRequest $request, int $id): JsonResponse
    {
        $productBO = new ProductBO(...$request->validated());
        return response()->json(['updated' => $this->productService->updateProduct($id, $productBO)]);
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json(['deleted' => $this->productService->deleteProduct($id)]);
    }
}
