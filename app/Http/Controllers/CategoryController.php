<?php

namespace App\Http\Controllers;

use App\BO\CategoryBO;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;
    
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return response()->json($this->categoryService->getAllCategories(request('parent_category_id')));
    }

    public function show($id)
    {
        return response()->json($this->categoryService->getCategoryById($id));
    }

    public function store(CategoryRequest $request)
    {
        $categoryBO = new CategoryBO(...$request->validated());
        return response()->json($this->categoryService->createCategory($categoryBO), 201);
    }

    public function update(CategoryRequest $request, $id)
    {
        $categoryBO = new CategoryBO(...$request->validated());
        return response()->json($this->categoryService->updateCategory($id, $categoryBO));
    }

    public function destroy($id)
    {
        return response()->json(['deleted' => $this->categoryService->deleteCategory($id)]);
    }
}
