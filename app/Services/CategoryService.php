<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\BO\CategoryBO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryService
{
    protected CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Retrieve all categories, optionally filtered by parent category.
     */
    public function getAllCategories(int $parentCategoryId = null)
    {
        return $this->categoryRepository->getAll($parentCategoryId);
    }

    /**
     * Retrieve a single category by its ID.
     */
    public function getCategoryById(int $id)
    {
        $category = $this->categoryRepository->findById($id);
        if (!$category) {
            throw new ModelNotFoundException("Category not found");
        }

        return new CategoryBO(
            $category->name,
            $category->description,
            $category->parent_category_id
        );
    }

    /**
     * Create a new category.
     */
    public function createCategory(CategoryBO $categoryBO)
    {
        return $this->categoryRepository->create($categoryBO);
    }

    /**
     * Update an existing category by its ID.
     */
    public function updateCategory(int $id, CategoryBO $categoryBO)
    {
        $updated = $this->categoryRepository->update($id, $categoryBO);
        if (!$updated) {
            throw new ModelNotFoundException("Category not found for update");
        }
        $category = $this->categoryRepository->findById($id);
        return $category;
    }

    /**
     * Delete a category by its ID.
     */
    public function deleteCategory(int $id)
    {
        $deleted = $this->categoryRepository->delete($id);
        if (!$deleted) {
            throw new ModelNotFoundException("Category not found for deletion");
        }

        return true;
    }
}
