<?php

namespace Tests\Unit;

use App\BO\CategoryBO;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class CategoryServiceTest extends TestCase
{
    private MockInterface $categoryRepository;
    private CategoryService $categoryService;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var CategoryRepositoryInterface&MockInterface */
        $this->categoryRepository = Mockery::mock(CategoryRepositoryInterface::class);
        $this->categoryService = new CategoryService($this->categoryRepository);
    }

    public function test_get_category_by_id_success()
    {
        // Mock the category data with proper types
        $category = new CategoryBO('Test Category', null); // Ensure correct type

        $this->categoryRepository
            ->shouldReceive('findById')
            ->once()
            ->with(1)
            ->andReturn($category);

        $result = $this->categoryService->getCategoryById(1);

        $this->assertInstanceOf(CategoryBO::class, $result);
        $this->assertEquals('Test Category', $result->name);
        $this->assertNull($result->parent_category_id); // Explicitly check for null
    }

    public function test_get_category_by_id_not_found()
    {
        $this->categoryRepository
            ->shouldReceive('findById')
            ->once()
            ->with(1)
            ->andReturn(null);

        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage('Category not found');

        $this->categoryService->getCategoryById(1);
    }


    public function test_create_category_success()
    {
        $categoryBO = new CategoryBO('New Category', null);

        $this->categoryRepository
            ->shouldReceive('create')
            ->once()
            ->with(Mockery::type(CategoryBO::class))
            ->andReturn(true);

        $result = $this->categoryService->createCategory($categoryBO);

        $this->assertTrue($result);
    }

    public function test_update_category_success()
    {
        $categoryBO = new CategoryBO('Updated Category', null);

        $existingCategory = (object) ['name' => 'Existing Category', 'parent_category_id' => null];

        // ✅ First, mock findById() to return an existing category
        $this->categoryRepository
            ->shouldReceive('findById')
            ->once()
            ->with(1)
            ->andReturn($existingCategory);

        // ✅ Then, mock update() to return true
        $this->categoryRepository
            ->shouldReceive('update')
            ->once()
            ->with(1, Mockery::type(CategoryBO::class))
            ->andReturn(true);

        $result = $this->categoryService->updateCategory(1, $categoryBO);

        $this->assertTrue($result); // ✅ Check that it returns true
    }



    public function test_delete_category_success()
    {
        $this->categoryRepository
            ->shouldReceive('delete')
            ->once()
            ->with(1)
            ->andReturn(true);

        $result = $this->categoryService->deleteCategory(1);

        $this->assertTrue($result);
    }

    public function test_delete_category_not_found()
    {
        $this->categoryRepository
            ->shouldReceive('delete')
            ->once()
            ->with(1)
            ->andReturn(false);

        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage('Category not found');

        $this->categoryService->deleteCategory(1);
    }
}
