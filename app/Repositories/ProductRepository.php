<?php 

namespace App\Repositories;

use App\BO\ProductBO;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(?int $categoryId = null, ?string $search = null)
    {
        $query = Product::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('sku', 'LIKE', "%{$search}%");
            });
        }

        return $query->paginate(10);
    }

    public function findById(int $id)
    {
        return Product::findOrFail($id);
    }

    public function create(ProductBO $productBO)
    {
        return Product::create((array) $productBO);
    }

    public function update(int $id, ProductBO $productBO)
    {
        Product::where('id', $id)->update((array) $productBO);
        return Product::findOrFail($id);
    }

    public function delete(int $id): bool
    {
        return Product::destroy($id);
    }
}



?>