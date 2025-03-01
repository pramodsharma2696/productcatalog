<?php 

namespace App\Repositories;

use App\BO\CategoryBO;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;


class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll(?int $parent_category_id = null)
    {
        
        if ($parent_category_id) {
            return Category::with('children')->where('parent_category_id', $parent_category_id)->get();
        }
        return Category::with('children')->whereNull('parent_category_id')->get();
    }

    public function findById(int $id)
    {
        return Category::findOrFail($id);
    }

    public function create(CategoryBO $CategoryBO)
    {
        return Category::create((array) $CategoryBO);
    }

    public function update(int $id, CategoryBO $CategoryBO)
    {
        Category::where('id', $id)->update((array) $CategoryBO);
        return Category::findOrFail($id);
    }

    public function delete(int $id): bool
    {
        return Category::destroy($id);
    }
}



?>