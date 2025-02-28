<?php 

namespace App\Repositories;

use App\BO\ProductBO;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(int $categoryId = null)
    {
        return $categoryId ? Product::where('category_id', $categoryId)->paginate(10) : Product::paginate(10);
    }

    public function findById(int $id)
    {
        return Product::find($id);
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