<?php 

namespace App\Repositories\Contracts;

use App\BO\ProductBO;

interface ProductRepositoryInterface
{
    public function getAll(int $categoryId = null);
    public function findById(int $id);
    public function create(ProductBO $productBO);
    public function update(int $id, ProductBO $productBO);
    public function delete(int $id);
}



?>