<?php

namespace App\Services;

use App\BO\ProductBO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductService
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Retrieve all products with optional category filtering.
     */
    public function getAllProducts(?int $categoryId = null, ?string $search = null)
    {
        return $this->productRepository->getAll($categoryId, $search);
    }

    /**
     * Retrieve a single product by its ID.
     * Throws an exception if not found.
     */
    public function getProductById(int $id)
    {
        $product = $this->productRepository->findById($id);
        if (!$product) {
            throw new ModelNotFoundException("Product not found");
        }

        return new ProductBO(
            $product->name,
            $product->description,
            $product->sku,
            $product->price,
            $product->category_id
        );
    }

    /**
     * Create a new product.
     */
    public function createProduct(ProductBO $productBO)
    {
        if ($productBO->price < 0) {
            throw new \InvalidArgumentException("Price cannot be negative");
        }

        return $this->productRepository->create($productBO);
    }

    /**
     * Update an existing product by its ID.
     * Throws an exception if not found.
     */
    public function updateProduct(int $id, ProductBO $productBO)
    {
        if ($productBO->price < 0) {
            throw new \InvalidArgumentException("Price cannot be negative");
        }

        // First, fetch the existing product
        $existingProduct = $this->productRepository->findById($id);
        if (!$existingProduct) {
            throw new ModelNotFoundException("Product not found");
        }

        // Then, proceed with the update
        $updated = $this->productRepository->update($id, $productBO);
        if (!$updated) {
            throw new ModelNotFoundException("Product not found for update");
        }

        return true;
    }


    /**
     * Delete a product by its ID.
     * Throws an exception if not found.
     */
    public function deleteProduct(int $id)
    {
        $deleted = $this->productRepository->delete($id);
        if (!$deleted) {
            throw new ModelNotFoundException("Product not found for deletion");
        }

        return true;
    }
}
