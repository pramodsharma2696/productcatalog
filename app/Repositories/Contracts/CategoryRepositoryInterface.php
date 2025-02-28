<?php 

namespace App\Repositories\Contracts;

use App\BO\CategoryBO;
use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getAll(int $parentCategoryId = null);
    public function findById(int $id);
    public function create(CategoryBO $categoryBO);
    public function update(int $id, CategoryBO $categoryBO);
    public function delete(int $id);
}



?>