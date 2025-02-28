<?php

namespace App\Http\Controllers;

use App\BO\ProductBO;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Get all products, optionally filtered by category.
     */
    public function index()
    {
        return response()->json($this->productService->getAllProducts(request('category_id')));
    }

    /**
     * Get a single product by ID.
     */
    public function show(int $id)
    {
        return response()->json($this->productService->getProductById($id));
    }

    /**
     * Create a new product.
     */
    public function store(ProductRequest $request)
    {
        $productBO = new ProductBO(...$request->validated());
        return response()->json($this->productService->createProduct($productBO), 201);
    }

    /**
     * Update a product by ID.
     */
    public function update(ProductRequest $request, int $id)
    {
        $productBO = new ProductBO(...$request->validated());
        return response()->json(['updated' => $this->productService->updateProduct($id, $productBO)]);
    }

    /**
     * Delete a product by ID.
     */
    public function destroy(int $id)
    {
        return response()->json(['deleted' => $this->productService->deleteProduct($id)]);
    }
}
