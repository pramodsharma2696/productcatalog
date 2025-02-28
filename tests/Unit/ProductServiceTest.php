<?php

namespace Tests\Unit;

use App\BO\ProductBO;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    private MockInterface $productRepository;
    private ProductService $productService;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var ProductRepositoryInterface&MockInterface */
        $this->productRepository = Mockery::mock(ProductRepositoryInterface::class);
        $this->productService = new ProductService($this->productRepository);
    }

    public function test_get_product_by_id_success()
    {
        // Mock the product data with proper types
        $product = new ProductBO('Test Product', 'Description of the test product', 'SKU12345', 100.00, 1); // Ensure correct type

        $this->productRepository
            ->shouldReceive('findById')
            ->once()
            ->with(1)
            ->andReturn($product);

        $result = $this->productService->getProductById(1);

        $this->assertInstanceOf(ProductBO::class, $result);
        $this->assertEquals('Test Product', $result->name);
        $this->assertEquals(100.00, $result->price);
        $this->assertEquals('Description of the test product', $result->description);
    }

    public function test_get_product_by_id_not_found()
    {
        $this->productRepository
            ->shouldReceive('findById')
            ->once()
            ->with(1)
            ->andReturn(null);

        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage('Product not found');

        $this->productService->getProductById(1);
    }

    public function test_create_product_success()
    {
        // Ensure correct parameters are passed to ProductBO
        $productBO = new ProductBO('New Product', 'Description of the new product', 'SKU54321', 150.00, 2);

        $this->productRepository
            ->shouldReceive('create')
            ->once()
            ->with(Mockery::type(ProductBO::class))
            ->andReturn(true);

        $result = $this->productService->createProduct($productBO);

        $this->assertTrue($result);
    }

    public function test_update_product_success()
    {
        $productBO = new ProductBO('Updated Product', 'Updated description of the product', 'SKU67890', 200.00, 2);

        $existingProduct = (object) ['name' => 'Existing Product', 'price' => 100.00, 'description' => 'Existing description'];

        // ✅ First, mock findById() to return an existing product
        $this->productRepository
            ->shouldReceive('findById')
            ->once()
            ->with(1)
            ->andReturn($existingProduct);

        // ✅ Then, mock update() to return true
        $this->productRepository
            ->shouldReceive('update')
            ->once()
            ->with(1, Mockery::type(ProductBO::class))
            ->andReturn(true);

        $result = $this->productService->updateProduct(1, $productBO);

        $this->assertTrue($result); // ✅ Check that it returns true
    }

    public function test_delete_product_success()
    {
        $this->productRepository
            ->shouldReceive('delete')
            ->once()
            ->with(1)
            ->andReturn(true);

        $result = $this->productService->deleteProduct(1);

        $this->assertTrue($result);
    }

    public function test_delete_product_not_found()
    {
        $this->productRepository
            ->shouldReceive('delete')
            ->once()
            ->with(1)
            ->andReturn(false);

        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage('Product not found');

        $this->productService->deleteProduct(1);
    }
}
