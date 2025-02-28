<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_all_products()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/products');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data'); // Ensure response has 3 products
    }

    public function test_can_fetch_a_single_product()
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/v1/products/{$product->id}");
        $response->assertJsonFragment([
            'name' => $product->name,
            'description' => $product->description,
            'sku' => $product->sku,
            'price' => $product->price,
            'category_id' => $product->category_id
        ]);
        
        
    }

    public function test_returns_404_if_product_not_found()
    {
        $response = $this->getJson('/api/v1/products/999');

        $response->assertStatus(404);
    }

    public function test_can_create_a_product()
    {
        $category = Category::factory()->create();

        $data = [
            'name' => 'New Product',
            'description' => 'Product Description',
            'sku' => 'PROD123',
            'price' => 150.99,
            'category_id' => $category->id
        ];

        $response = $this->postJson('/api/v1/products', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $this->assertDatabaseHas('products', ['name' => 'New Product']);
    }

    public function test_can_update_a_product()
    {
        $product = Product::factory()->create();

        $updateData = [
            'name' => 'Updated Name',
            'description' => $product->description,
            'sku' => $product->sku,
            'price' => $product->price,
            'category_id' => $product->category_id
        ];

        $response = $this->putJson("/api/v1/products/{$product->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJson([
                     'updated' => true // Ensure this matches your API response
                 ]);

        $this->assertDatabaseHas('products', ['name' => 'Updated Name']);
    }

    public function test_can_delete_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/v1/products/{$product->id}");

        $response->assertStatus(200)
                 ->assertJson(['deleted' => true]);

        if (method_exists(Product::class, 'bootSoftDeletes')) {
            $this->assertSoftDeleted('products', ['id' => $product->id]); // Soft delete check
        } else {
            $this->assertDatabaseMissing('products', ['id' => $product->id]); // Hard delete check
        }
    }
}
