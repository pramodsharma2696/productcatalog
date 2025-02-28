<?php

namespace App\Http\Controllers;

use App\BO\CategoryBO;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->categoryService->getAllCategories(request('parent_category_id')));
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->categoryService->getCategoryById($id));
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $categoryBO = new CategoryBO(...$request->validated());
        return response()->json($this->categoryService->createCategory($categoryBO), 201);
    }

    public function update(CategoryRequest $request, int $id): JsonResponse
    {
        $categoryBO = new CategoryBO(...$request->validated());
        return response()->json($this->categoryService->updateCategory($id, $categoryBO));
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json(['deleted' => $this->categoryService->deleteCategory($id)]);
    }
}
